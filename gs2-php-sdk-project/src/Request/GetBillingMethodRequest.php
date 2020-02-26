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
 * 支払い方法を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetBillingMethodRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントトークン */
    private $accountToken;

    /**
     * GS2アカウントトークンを取得
     *
     * @return string|null 支払い方法を取得
     */
    public function getAccountToken(): ?string {
        return $this->accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 支払い方法を取得
     */
    public function setAccountToken(string $accountToken) {
        $this->accountToken = $accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 支払い方法を取得
     * @return GetBillingMethodRequest $this
     */
    public function withAccountToken(string $accountToken): GetBillingMethodRequest {
        $this->setAccountToken($accountToken);
        return $this;
    }

    /** @var string 名前 */
    private $billingMethodName;

    /**
     * 名前を取得
     *
     * @return string|null 支払い方法を取得
     */
    public function getBillingMethodName(): ?string {
        return $this->billingMethodName;
    }

    /**
     * 名前を設定
     *
     * @param string $billingMethodName 支払い方法を取得
     */
    public function setBillingMethodName(string $billingMethodName) {
        $this->billingMethodName = $billingMethodName;
    }

    /**
     * 名前を設定
     *
     * @param string $billingMethodName 支払い方法を取得
     * @return GetBillingMethodRequest $this
     */
    public function withBillingMethodName(string $billingMethodName): GetBillingMethodRequest {
        $this->setBillingMethodName($billingMethodName);
        return $this;
    }

}