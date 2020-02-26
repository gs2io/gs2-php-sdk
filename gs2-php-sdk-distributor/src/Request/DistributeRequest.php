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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Distributor\Model\DistributeResource;

/**
 * 所持品を配布する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DistributeRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 所持品を配布する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 所持品を配布する
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 所持品を配布する
     * @return DistributeRequest $this
     */
    public function withNamespaceName(string $namespaceName): DistributeRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ディストリビューターの種類名 */
    private $distributorName;

    /**
     * ディストリビューターの種類名を取得
     *
     * @return string|null 所持品を配布する
     */
    public function getDistributorName(): ?string {
        return $this->distributorName;
    }

    /**
     * ディストリビューターの種類名を設定
     *
     * @param string $distributorName 所持品を配布する
     */
    public function setDistributorName(string $distributorName) {
        $this->distributorName = $distributorName;
    }

    /**
     * ディストリビューターの種類名を設定
     *
     * @param string $distributorName 所持品を配布する
     * @return DistributeRequest $this
     */
    public function withDistributorName(string $distributorName): DistributeRequest {
        $this->setDistributorName($distributorName);
        return $this;
    }

    /** @var DistributeResource 加算するリソース */
    private $distributeResource;

    /**
     * 加算するリソースを取得
     *
     * @return DistributeResource|null 所持品を配布する
     */
    public function getDistributeResource(): ?DistributeResource {
        return $this->distributeResource;
    }

    /**
     * 加算するリソースを設定
     *
     * @param DistributeResource $distributeResource 所持品を配布する
     */
    public function setDistributeResource(DistributeResource $distributeResource) {
        $this->distributeResource = $distributeResource;
    }

    /**
     * 加算するリソースを設定
     *
     * @param DistributeResource $distributeResource 所持品を配布する
     * @return DistributeRequest $this
     */
    public function withDistributeResource(DistributeResource $distributeResource): DistributeRequest {
        $this->setDistributeResource($distributeResource);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 所持品を配布する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 所持品を配布する
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 所持品を配布する
     * @return DistributeRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DistributeRequest {
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
     * @return DistributeRequest this
     */
    public function withAccessToken(string $accessToken): DistributeRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}