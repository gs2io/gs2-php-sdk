<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Realtime\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Realtime\Model\NotificationSetting;
use Gs2\Realtime\Model\LogSetting;

/**
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $name;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name = null): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description = null): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string サーバの種類 */
    private $serverType;

    /**
     * サーバの種類を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getServerType(): ?string {
        return $this->serverType;
    }

    /**
     * サーバの種類を設定
     *
     * @param string $serverType ネームスペースを新規作成
     */
    public function setServerType(string $serverType = null) {
        $this->serverType = $serverType;
    }

    /**
     * サーバの種類を設定
     *
     * @param string $serverType ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withServerType(string $serverType = null): CreateNamespaceRequest {
        $this->setServerType($serverType);
        return $this;
    }

    /** @var string サーバのスペック */
    private $serverSpec;

    /**
     * サーバのスペックを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getServerSpec(): ?string {
        return $this->serverSpec;
    }

    /**
     * サーバのスペックを設定
     *
     * @param string $serverSpec ネームスペースを新規作成
     */
    public function setServerSpec(string $serverSpec = null) {
        $this->serverSpec = $serverSpec;
    }

    /**
     * サーバのスペックを設定
     *
     * @param string $serverSpec ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withServerSpec(string $serverSpec = null): CreateNamespaceRequest {
        $this->setServerSpec($serverSpec);
        return $this;
    }

    /** @var NotificationSetting ルームの作成が終わったときのプッシュ通知 */
    private $createNotification;

    /**
     * ルームの作成が終わったときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getCreateNotification(): ?NotificationSetting {
        return $this->createNotification;
    }

    /**
     * ルームの作成が終わったときのプッシュ通知を設定
     *
     * @param NotificationSetting $createNotification ネームスペースを新規作成
     */
    public function setCreateNotification(NotificationSetting $createNotification = null) {
        $this->createNotification = $createNotification;
    }

    /**
     * ルームの作成が終わったときのプッシュ通知を設定
     *
     * @param NotificationSetting $createNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCreateNotification(NotificationSetting $createNotification = null): CreateNamespaceRequest {
        $this->setCreateNotification($createNotification);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを新規作成
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}