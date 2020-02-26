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

namespace Gs2\Gateway\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 通知を送信 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SendNotificationRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 通知を送信
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 通知を送信
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withNamespaceName(string $namespaceName): SendNotificationRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 通知を送信
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 通知を送信
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withUserId(string $userId): SendNotificationRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 通知元のサービス */
    private $issuer;

    /**
     * 通知元のサービスを取得
     *
     * @return string|null 通知を送信
     */
    public function getIssuer(): ?string {
        return $this->issuer;
    }

    /**
     * 通知元のサービスを設定
     *
     * @param string $issuer 通知を送信
     */
    public function setIssuer(string $issuer) {
        $this->issuer = $issuer;
    }

    /**
     * 通知元のサービスを設定
     *
     * @param string $issuer 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withIssuer(string $issuer): SendNotificationRequest {
        $this->setIssuer($issuer);
        return $this;
    }

    /** @var string タイトル */
    private $subject;

    /**
     * タイトルを取得
     *
     * @return string|null 通知を送信
     */
    public function getSubject(): ?string {
        return $this->subject;
    }

    /**
     * タイトルを設定
     *
     * @param string $subject 通知を送信
     */
    public function setSubject(string $subject) {
        $this->subject = $subject;
    }

    /**
     * タイトルを設定
     *
     * @param string $subject 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withSubject(string $subject): SendNotificationRequest {
        $this->setSubject($subject);
        return $this;
    }

    /** @var string ペイロード */
    private $payload;

    /**
     * ペイロードを取得
     *
     * @return string|null 通知を送信
     */
    public function getPayload(): ?string {
        return $this->payload;
    }

    /**
     * ペイロードを設定
     *
     * @param string $payload 通知を送信
     */
    public function setPayload(string $payload) {
        $this->payload = $payload;
    }

    /**
     * ペイロードを設定
     *
     * @param string $payload 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withPayload(string $payload): SendNotificationRequest {
        $this->setPayload($payload);
        return $this;
    }

    /** @var bool 通知先のユーザがオフラインだったときにモバイルプッシュ通知に転送するか */
    private $enableTransferMobileNotification;

    /**
     * 通知先のユーザがオフラインだったときにモバイルプッシュ通知に転送するかを取得
     *
     * @return bool|null 通知を送信
     */
    public function getEnableTransferMobileNotification(): ?bool {
        return $this->enableTransferMobileNotification;
    }

    /**
     * 通知先のユーザがオフラインだったときにモバイルプッシュ通知に転送するかを設定
     *
     * @param bool $enableTransferMobileNotification 通知を送信
     */
    public function setEnableTransferMobileNotification(bool $enableTransferMobileNotification) {
        $this->enableTransferMobileNotification = $enableTransferMobileNotification;
    }

    /**
     * 通知先のユーザがオフラインだったときにモバイルプッシュ通知に転送するかを設定
     *
     * @param bool $enableTransferMobileNotification 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withEnableTransferMobileNotification(bool $enableTransferMobileNotification): SendNotificationRequest {
        $this->setEnableTransferMobileNotification($enableTransferMobileNotification);
        return $this;
    }

    /** @var string 再生する音声ファイル名 */
    private $sound;

    /**
     * 再生する音声ファイル名を取得
     *
     * @return string|null 通知を送信
     */
    public function getSound(): ?string {
        return $this->sound;
    }

    /**
     * 再生する音声ファイル名を設定
     *
     * @param string $sound 通知を送信
     */
    public function setSound(string $sound) {
        $this->sound = $sound;
    }

    /**
     * 再生する音声ファイル名を設定
     *
     * @param string $sound 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withSound(string $sound): SendNotificationRequest {
        $this->setSound($sound);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 通知を送信
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 通知を送信
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 通知を送信
     * @return SendNotificationRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): SendNotificationRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}