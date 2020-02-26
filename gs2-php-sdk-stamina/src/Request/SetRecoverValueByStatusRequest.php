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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタミナの最大値をGS2-Experienceのステータスを使用して更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SetRecoverValueByStatusRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナの最大値をGS2-Experienceのステータスを使用して更新
     * @return SetRecoverValueByStatusRequest $this
     */
    public function withNamespaceName(string $namespaceName): SetRecoverValueByStatusRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナの種類名 */
    private $staminaName;

    /**
     * スタミナの種類名を取得
     *
     * @return string|null スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function getStaminaName(): ?string {
        return $this->staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function setStaminaName(string $staminaName) {
        $this->staminaName = $staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName スタミナの最大値をGS2-Experienceのステータスを使用して更新
     * @return SetRecoverValueByStatusRequest $this
     */
    public function withStaminaName(string $staminaName): SetRecoverValueByStatusRequest {
        $this->setStaminaName($staminaName);
        return $this;
    }

    /** @var string 署名をつけるのに使用した暗号鍵 のGRN */
    private $keyId;

    /**
     * 署名をつけるのに使用した暗号鍵 のGRNを取得
     *
     * @return string|null スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 署名をつけるのに使用した暗号鍵 のGRNを設定
     *
     * @param string $keyId スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * 署名をつけるのに使用した暗号鍵 のGRNを設定
     *
     * @param string $keyId スタミナの最大値をGS2-Experienceのステータスを使用して更新
     * @return SetRecoverValueByStatusRequest $this
     */
    public function withKeyId(string $keyId): SetRecoverValueByStatusRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 署名対象のステータスボディ */
    private $signedStatusBody;

    /**
     * 署名対象のステータスボディを取得
     *
     * @return string|null スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function getSignedStatusBody(): ?string {
        return $this->signedStatusBody;
    }

    /**
     * 署名対象のステータスボディを設定
     *
     * @param string $signedStatusBody スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function setSignedStatusBody(string $signedStatusBody) {
        $this->signedStatusBody = $signedStatusBody;
    }

    /**
     * 署名対象のステータスボディを設定
     *
     * @param string $signedStatusBody スタミナの最大値をGS2-Experienceのステータスを使用して更新
     * @return SetRecoverValueByStatusRequest $this
     */
    public function withSignedStatusBody(string $signedStatusBody): SetRecoverValueByStatusRequest {
        $this->setSignedStatusBody($signedStatusBody);
        return $this;
    }

    /** @var string ステータスの署名 */
    private $signedStatusSignature;

    /**
     * ステータスの署名を取得
     *
     * @return string|null スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function getSignedStatusSignature(): ?string {
        return $this->signedStatusSignature;
    }

    /**
     * ステータスの署名を設定
     *
     * @param string $signedStatusSignature スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function setSignedStatusSignature(string $signedStatusSignature) {
        $this->signedStatusSignature = $signedStatusSignature;
    }

    /**
     * ステータスの署名を設定
     *
     * @param string $signedStatusSignature スタミナの最大値をGS2-Experienceのステータスを使用して更新
     * @return SetRecoverValueByStatusRequest $this
     */
    public function withSignedStatusSignature(string $signedStatusSignature): SetRecoverValueByStatusRequest {
        $this->setSignedStatusSignature($signedStatusSignature);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタミナの最大値をGS2-Experienceのステータスを使用して更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタミナの最大値をGS2-Experienceのステータスを使用して更新
     * @return SetRecoverValueByStatusRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): SetRecoverValueByStatusRequest {
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
     * @return SetRecoverValueByStatusRequest this
     */
    public function withAccessToken(string $accessToken): SetRecoverValueByStatusRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}