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

/**
 * ルームの作成依頼。 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class WantRoomRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ルームの作成依頼。
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームの作成依頼。
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームの作成依頼。
     * @return WantRoomRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): WantRoomRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $name;

    /**
     * ルーム名を取得
     *
     * @return string|null ルームの作成依頼。
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ルーム名を設定
     *
     * @param string $name ルームの作成依頼。
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * ルーム名を設定
     *
     * @param string $name ルームの作成依頼。
     * @return WantRoomRequest $this
     */
    public function withName(string $name = null): WantRoomRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string[] ルームの作成が終わったときに通知を受けるユーザIDリスト */
    private $notificationUserIds;

    /**
     * ルームの作成が終わったときに通知を受けるユーザIDリストを取得
     *
     * @return string[]|null ルームの作成依頼。
     */
    public function getNotificationUserIds(): ?array {
        return $this->notificationUserIds;
    }

    /**
     * ルームの作成が終わったときに通知を受けるユーザIDリストを設定
     *
     * @param string[] $notificationUserIds ルームの作成依頼。
     */
    public function setNotificationUserIds(array $notificationUserIds = null) {
        $this->notificationUserIds = $notificationUserIds;
    }

    /**
     * ルームの作成が終わったときに通知を受けるユーザIDリストを設定
     *
     * @param string[] $notificationUserIds ルームの作成依頼。
     * @return WantRoomRequest $this
     */
    public function withNotificationUserIds(array $notificationUserIds = null): WantRoomRequest {
        $this->setNotificationUserIds($notificationUserIds);
        return $this;
    }

}