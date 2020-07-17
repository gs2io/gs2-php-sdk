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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 支払い方法を新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateBillingMethodRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントトークン */
    private $accountToken;

    /**
     * GS2アカウントトークンを取得
     *
     * @return string|null 支払い方法を新規作成
     */
    public function getAccountToken(): ?string {
        return $this->accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 支払い方法を新規作成
     */
    public function setAccountToken(string $accountToken = null) {
        $this->accountToken = $accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 支払い方法を新規作成
     * @return CreateBillingMethodRequest $this
     */
    public function withAccountToken(string $accountToken = null): CreateBillingMethodRequest {
        $this->setAccountToken($accountToken);
        return $this;
    }

    /** @var string 名前 */
    private $description;

    /**
     * 名前を取得
     *
     * @return string|null 支払い方法を新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 名前を設定
     *
     * @param string $description 支払い方法を新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 名前を設定
     *
     * @param string $description 支払い方法を新規作成
     * @return CreateBillingMethodRequest $this
     */
    public function withDescription(string $description = null): CreateBillingMethodRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 支払い方法 */
    private $methodType;

    /**
     * 支払い方法を取得
     *
     * @return string|null 支払い方法を新規作成
     */
    public function getMethodType(): ?string {
        return $this->methodType;
    }

    /**
     * 支払い方法を設定
     *
     * @param string $methodType 支払い方法を新規作成
     */
    public function setMethodType(string $methodType = null) {
        $this->methodType = $methodType;
    }

    /**
     * 支払い方法を設定
     *
     * @param string $methodType 支払い方法を新規作成
     * @return CreateBillingMethodRequest $this
     */
    public function withMethodType(string $methodType = null): CreateBillingMethodRequest {
        $this->setMethodType($methodType);
        return $this;
    }

    /** @var string クレジットカードカスタマーID */
    private $cardCustomerId;

    /**
     * クレジットカードカスタマーIDを取得
     *
     * @return string|null 支払い方法を新規作成
     */
    public function getCardCustomerId(): ?string {
        return $this->cardCustomerId;
    }

    /**
     * クレジットカードカスタマーIDを設定
     *
     * @param string $cardCustomerId 支払い方法を新規作成
     */
    public function setCardCustomerId(string $cardCustomerId = null) {
        $this->cardCustomerId = $cardCustomerId;
    }

    /**
     * クレジットカードカスタマーIDを設定
     *
     * @param string $cardCustomerId 支払い方法を新規作成
     * @return CreateBillingMethodRequest $this
     */
    public function withCardCustomerId(string $cardCustomerId = null): CreateBillingMethodRequest {
        $this->setCardCustomerId($cardCustomerId);
        return $this;
    }

    /** @var string パートナーID */
    private $partnerId;

    /**
     * パートナーIDを取得
     *
     * @return string|null 支払い方法を新規作成
     */
    public function getPartnerId(): ?string {
        return $this->partnerId;
    }

    /**
     * パートナーIDを設定
     *
     * @param string $partnerId 支払い方法を新規作成
     */
    public function setPartnerId(string $partnerId = null) {
        $this->partnerId = $partnerId;
    }

    /**
     * パートナーIDを設定
     *
     * @param string $partnerId 支払い方法を新規作成
     * @return CreateBillingMethodRequest $this
     */
    public function withPartnerId(string $partnerId = null): CreateBillingMethodRequest {
        $this->setPartnerId($partnerId);
        return $this;
    }

}