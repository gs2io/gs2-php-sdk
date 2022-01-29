<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Core\Domain;

use Gs2\Account\Domain\Gs2Account;
use Gs2\Auth\Domain\Gs2Auth;
use Gs2\Chat\Domain\Gs2Chat;
use Gs2\Datastore\Domain\Gs2Datastore;
use Gs2\Dictionary\Domain\Gs2Dictionary;
use Gs2\Distributor\Domain\Gs2Distributor;
use Gs2\Enhance\Domain\Gs2Enhance;
use Gs2\Exchange\Domain\Gs2Exchange;
use Gs2\Experience\Domain\Gs2Experience;
use Gs2\Formation\Domain\Gs2Formation;
use Gs2\Friend\Domain\Gs2Friend;
use Gs2\Gateway\Domain\Gs2Gateway;
use Gs2\Identifier\Domain\Gs2Identifier;
use Gs2\Inbox\Domain\Gs2Inbox;
use Gs2\Inventory\Domain\Gs2Inventory;
use Gs2\JobQueue\Domain\Gs2JobQueue;
use Gs2\Key\Domain\Gs2Key;
use Gs2\Limit\Domain\Gs2Limit;
use Gs2\Lock\Domain\Gs2Lock;
use Gs2\Log\Domain\Gs2Log;
use Gs2\Lottery\Domain\Gs2Lottery;
use Gs2\Matchmaking\Domain\Gs2Matchmaking;
use Gs2\Mission\Domain\Gs2Mission;
use Gs2\Money\Domain\Gs2Money;
use Gs2\News\Domain\Gs2News;
use Gs2\Quest\Domain\Gs2Quest;
use Gs2\Ranking\Domain\Gs2Ranking;
use Gs2\Realtime\Domain\Gs2Realtime;
use Gs2\Schedule\Domain\Gs2Schedule;
use Gs2\Script\Domain\Gs2Script;
use Gs2\Showcase\Domain\Gs2Showcase;
use Gs2\Stamina\Domain\Gs2Stamina;
use Gs2\Version\Domain\Gs2Version;
use Gs2\Core\Net\Gs2Session;

class Gs2
{
    /**
     * @var Gs2Account
     */
    public $account;

    /**
     * @var Gs2Auth
     */
    public $auth;

    /**
     * @var Gs2Chat
     */
    public $chat;

    /**
     * @var Gs2Datastore
     */
    public $datastore;

    /**
     * @var Gs2Dictionary
     */
    public $dictionary;

    /**
     * @var Gs2Distributor
     */
    public $distributor;

    /**
     * @var Gs2Enhance
     */
    public $enhance;

    /**
     * @var Gs2Exchange
     */
    public $exchange;

    /**
     * @var Gs2Experience
     */
    public $experience;

    /**
     * @var Gs2Formation
     */
    public $formation;

    /**
     * @var Gs2Friend
     */
    public $friend;

    /**
     * @var Gs2Gateway
     */
    public $gateway;

    /**
     * @var Gs2Identifier
     */
    public $identifier;

    /**
     * @var Gs2Inbox
     */
    public $inbox;

    /**
     * @var Gs2Inventory
     */
    public $inventory;

    /**
     * @var Gs2JobQueue
     */
    public $jobQueue;

    /**
     * @var Gs2Key
     */
    public $key;

    /**
     * @var Gs2Limit
     */
    public $limit;

    /**
     * @var Gs2Lock
     */
    public $lock;

    /**
     * @var Gs2Log
     */
    public $log;

    /**
     * @var Gs2Lottery
     */
    public $lottery;

    /**
     * @var Gs2Matchmaking
     */
    public $matchmaking;

    /**
     * @var Gs2Mission
     */
    public $mission;

    /**
     * @var Gs2Money
     */
    public $money;

    /**
     * @var Gs2News
     */
    public $news;

    /**
     * @var Gs2Quest
     */
    public $quest;

    /**
     * @var Gs2Ranking
     */
    public $ranking;

    /**
     * @var Gs2Realtime
     */
    public $realtime;

    /**
     * @var Gs2Schedule
     */
    public $schedule;

    /**
     * @var Gs2Script
     */
    public $script;

    /**
     * @var Gs2Showcase
     */
    public $showcase;

    /**
     * @var Gs2Stamina
     */
    public $stamina;

    /**
     * @var Gs2Version
     */
    public $version;

    public function __construct(
        Gs2Session $session
    ) {
        $this->account = new Gs2Account($session);
        $this->auth = new Gs2Auth($session);
        $this->chat = new Gs2Chat($session);
        $this->datastore = new Gs2Datastore($session);
        $this->dictionary = new Gs2Dictionary($session);
        $this->distributor = new Gs2Distributor($session);
        $this->enhance = new Gs2Enhance($session);
        $this->exchange = new Gs2Exchange($session);
        $this->experience = new Gs2Experience($session);
        $this->formation = new Gs2Formation($session);
        $this->friend = new Gs2Friend($session);
        $this->gateway = new Gs2Gateway($session);
        $this->identifier = new Gs2Identifier($session);
        $this->inbox = new Gs2Inbox($session);
        $this->inventory = new Gs2Inventory($session);
        $this->jobQueue = new Gs2JobQueue($session);
        $this->key = new Gs2Key($session);
        $this->limit = new Gs2Limit($session);
        $this->lock = new Gs2Lock($session);
        $this->log = new Gs2Log($session);
        $this->lottery = new Gs2Lottery($session);
        $this->matchmaking = new Gs2Matchmaking($session);
        $this->mission = new Gs2Mission($session);
        $this->money = new Gs2Money($session);
        $this->news = new Gs2News($session);
        $this->quest = new Gs2Quest($session);
        $this->ranking = new Gs2Ranking($session);
        $this->realtime = new Gs2Realtime($session);
        $this->schedule = new Gs2Schedule($session);
        $this->script = new Gs2Script($session);
        $this->showcase = new Gs2Showcase($session);
        $this->stamina = new Gs2Stamina($session);
        $this->version = new Gs2Version($session);
    }
}