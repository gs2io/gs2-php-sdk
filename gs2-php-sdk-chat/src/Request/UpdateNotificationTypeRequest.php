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
 * 通知方法を更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNotificationTypeRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 通知方法を更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 通知方法を更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 通知方法を更新
     * @return UpdateNotificationTypeRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateNotificationTypeRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $roomName;

    /**
     * ルーム名を取得
     *
     * @return string|null 通知方法を更新
     */
    public function getRoomName(): ?string {
        return $this->roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName 通知方法を更新
     */
    public function setRoomName(string $roomName) {
        $this->roomName = $roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName 通知方法を更新
     * @return UpdateNotificationTypeRequest $this
     */
    public function withRoomName(string $roomName): UpdateNotificationTypeRequest {
        $this->setRoomName($roomName);
        return $this;
    }

    /** @var NotificationType[] 新着メッセージ通知を受け取るカテゴリリスト */
    private $notificationTypes;

    /**
     * 新着メッセージ通知を受け取るカテゴリリストを取得
     *
     * @return NotificationType[]|null 通知方法を更新
     */
    public function getNotificationTypes(): ?array {
        return $this->notificationTypes;
    }

    /**
     * 新着メッセージ通知を受け取るカテゴリリストを設定
     *
     * @param NotificationType[] $notificationTypes 通知方法を更新
     */
    public function setNotificationTypes(array $notificationTypes) {
        $this->notificationTypes = $notificationTypes;
    }

    /**
     * 新着メッセージ通知を受け取るカテゴリリストを設定
     *
     * @param NotificationType[] $notificationTypes 通知方法を更新
     * @return UpdateNotificationTypeRequest $this
     */
    public function withNotificationTypes(array $notificationTypes): UpdateNotificationTypeRequest {
        $this->setNotificationTypes($notificationTypes);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 通知方法を更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 通知方法を更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 通知方法を更新
     * @return UpdateNotificationTypeRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): UpdateNotificationTypeRequest {
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
     * @return UpdateNotificationTypeRequest this
     */
    public function withAccessToken(string $accessToken): UpdateNotificationTypeRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}