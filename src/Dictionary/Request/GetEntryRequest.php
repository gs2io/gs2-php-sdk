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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * エントリーを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEntryRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null エントリーを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーを取得
     * @return GetEntryRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetEntryRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string エントリー名 */
    private $entryModelName;

    /**
     * エントリー名を取得
     *
     * @return string|null エントリーを取得
     */
    public function getEntryModelName(): ?string {
        return $this->entryModelName;
    }

    /**
     * エントリー名を設定
     *
     * @param string $entryModelName エントリーを取得
     */
    public function setEntryModelName(string $entryModelName = null) {
        $this->entryModelName = $entryModelName;
    }

    /**
     * エントリー名を設定
     *
     * @param string $entryModelName エントリーを取得
     * @return GetEntryRequest $this
     */
    public function withEntryModelName(string $entryModelName = null): GetEntryRequest {
        $this->setEntryModelName($entryModelName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null エントリーを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider エントリーを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider エントリーを取得
     * @return GetEntryRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetEntryRequest {
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
     * @return GetEntryRequest this
     */
    public function withAccessToken(string $accessToken): GetEntryRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}