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
 * 所持品を配布する(溢れた際の救済処置無し) のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DistributeWithoutOverflowProcessRequest extends Gs2BasicRequest {

    /** @var DistributeResource 加算するリソース */
    private $distributeResource;

    /**
     * 加算するリソースを取得
     *
     * @return DistributeResource|null 所持品を配布する(溢れた際の救済処置無し)
     */
    public function getDistributeResource(): ?DistributeResource {
        return $this->distributeResource;
    }

    /**
     * 加算するリソースを設定
     *
     * @param DistributeResource $distributeResource 所持品を配布する(溢れた際の救済処置無し)
     */
    public function setDistributeResource(DistributeResource $distributeResource) {
        $this->distributeResource = $distributeResource;
    }

    /**
     * 加算するリソースを設定
     *
     * @param DistributeResource $distributeResource 所持品を配布する(溢れた際の救済処置無し)
     * @return DistributeWithoutOverflowProcessRequest $this
     */
    public function withDistributeResource(DistributeResource $distributeResource): DistributeWithoutOverflowProcessRequest {
        $this->setDistributeResource($distributeResource);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 所持品を配布する(溢れた際の救済処置無し)
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 所持品を配布する(溢れた際の救済処置無し)
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 所持品を配布する(溢れた際の救済処置無し)
     * @return DistributeWithoutOverflowProcessRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DistributeWithoutOverflowProcessRequest {
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
     * @return DistributeWithoutOverflowProcessRequest this
     */
    public function withAccessToken(string $accessToken): DistributeWithoutOverflowProcessRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}