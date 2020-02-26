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
 * ネームスペースを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string サーバの種類 */
    private $serverType;

    /**
     * サーバの種類を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getServerType(): ?string {
        return $this->serverType;
    }

    /**
     * サーバの種類を設定
     *
     * @param string $serverType ネームスペースを更新
     */
    public function setServerType(string $serverType) {
        $this->serverType = $serverType;
    }

    /**
     * サーバの種類を設定
     *
     * @param string $serverType ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withServerType(string $serverType): UpdateNamespaceRequest {
        $this->setServerType($serverType);
        return $this;
    }

    /** @var string サーバのスペック */
    private $serverSpec;

    /**
     * サーバのスペックを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getServerSpec(): ?string {
        return $this->serverSpec;
    }

    /**
     * サーバのスペックを設定
     *
     * @param string $serverSpec ネームスペースを更新
     */
    public function setServerSpec(string $serverSpec) {
        $this->serverSpec = $serverSpec;
    }

    /**
     * サーバのスペックを設定
     *
     * @param string $serverSpec ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withServerSpec(string $serverSpec): UpdateNamespaceRequest {
        $this->setServerSpec($serverSpec);
        return $this;
    }

    /** @var NotificationSetting ルームの作成が終わったときのプッシュ通知 */
    private $createNotification;

    /**
     * ルームの作成が終わったときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを更新
     */
    public function getCreateNotification(): ?NotificationSetting {
        return $this->createNotification;
    }

    /**
     * ルームの作成が終わったときのプッシュ通知を設定
     *
     * @param NotificationSetting $createNotification ネームスペースを更新
     */
    public function setCreateNotification(NotificationSetting $createNotification) {
        $this->createNotification = $createNotification;
    }

    /**
     * ルームの作成が終わったときのプッシュ通知を設定
     *
     * @param NotificationSetting $createNotification ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateNotification(NotificationSetting $createNotification): UpdateNamespaceRequest {
        $this->setCreateNotification($createNotification);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを更新
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     */
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}