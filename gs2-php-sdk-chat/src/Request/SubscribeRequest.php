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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Chat\Model\NotificationType;

/**
 * ルームを購読 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SubscribeRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ルームを購読
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを購読
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを購読
     * @return SubscribeRequest $this
     */
    public function withNamespaceName(string $namespaceName): SubscribeRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $roomName;

    /**
     * ルーム名を取得
     *
     * @return string|null ルームを購読
     */
    public function getRoomName(): ?string {
        return $this->roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ルームを購読
     */
    public function setRoomName(string $roomName) {
        $this->roomName = $roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ルームを購読
     * @return SubscribeRequest $this
     */
    public function withRoomName(string $roomName): SubscribeRequest {
        $this->setRoomName($roomName);
        return $this;
    }

    /** @var NotificationType[] 新着メッセージ通知を受け取るカテゴリリスト */
    private $notificationTypes;

    /**
     * 新着メッセージ通知を受け取るカテゴリリストを取得
     *
     * @return NotificationType[]|null ルームを購読
     */
    public function getNotificationTypes(): ?array {
        return $this->notificationTypes;
    }

    /**
     * 新着メッセージ通知を受け取るカテゴリリストを設定
     *
     * @param NotificationType[] $notificationTypes ルームを購読
     */
    public function setNotificationTypes(array $notificationTypes) {
        $this->notificationTypes = $notificationTypes;
    }

    /**
     * 新着メッセージ通知を受け取るカテゴリリストを設定
     *
     * @param NotificationType[] $notificationTypes ルームを購読
     * @return SubscribeRequest $this
     */
    public function withNotificationTypes(array $notificationTypes): SubscribeRequest {
        $this->setNotificationTypes($notificationTypes);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ルームを購読
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ルームを購読
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ルームを購読
     * @return SubscribeRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): SubscribeRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

    /** @var string アクセストークン */
    private $accessToken;

    /**
     * アクセストークンを取得
     *
     * @return string アクセストークン
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     */
    public function setAccessToken(string $accessToken) {
        $this->accessToken = $accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     * @return SubscribeRequest this
     */
    public function withAccessToken(string $accessToken): SubscribeRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}