<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;
use craft\helpers\MigrationHelper;
use DateTime;
use DateTimeZone;
use yii\db\Expression;

/**
 * m210830_122419_track_plugin_install_counts migration.
 */
class m210830_122419_track_plugin_install_counts extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        $this->createTable('craftnet_plugin_installs', [
            'id' => $this->primaryKey(),
            'pluginId' => $this->integer()->notNull(),
            'activeInstalls' => $this->integer()->notNull()->defaultValue(0),
            'date' => $this->date()->notNull(),
        ]);

        $this->addForeignKey(null, 'craftnet_plugin_installs', ['pluginId'], 'craftnet_plugins', ['id'], 'CASCADE');
        $this->createIndex(null, 'craftnet_plugin_installs', ['pluginId', 'date'], true);

        $this->execute('insert into craftnet_plugin_installs("pluginId", "activeInstalls", date) ' .
            'select id, "activeInstalls", :date from craftnet_plugins', [
            'date' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d'),
        ]);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        MigrationHelper::dropTable('craftnet_plugin_installs');
        return true;
    }
}
