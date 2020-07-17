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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * データオブジェクトを世代を指定してダウンロード準備する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareDownloadByGenerationRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null データオブジェクトを世代を指定してダウンロード準備する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データオブジェクトを世代を指定してダウンロード準備する
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データオブジェクトを世代を指定してダウンロード準備する
     * @return PrepareDownloadByGenerationRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): PrepareDownloadByGenerationRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string データオブジェクト */
    private $dataObjectId;

    /**
     * データオブジェクトを取得
     *
     * @return string|null データオブジェクトを世代を指定してダウンロード準備する
     */
    public function getDataObjectId(): ?string {
        return $this->dataObjectId;
    }

    /**
     * データオブジェクトを設定
     *
     * @param string $dataObjectId データオブジェクトを世代を指定してダウンロード準備する
     */
    public function setDataObjectId(string $dataObjectId = null) {
        $this->dataObjectId = $dataObjectId;
    }

    /**
     * データオブジェクトを設定
     *
     * @param string $dataObjectId データオブジェクトを世代を指定してダウンロード準備する
     * @return PrepareDownloadByGenerationRequest $this
     */
    public function withDataObjectId(string $dataObjectId = null): PrepareDownloadByGenerationRequest {
        $this->setDataObjectId($dataObjectId);
        return $this;
    }

    /** @var string 世代 */
    private $generation;

    /**
     * 世代を取得
     *
     * @return string|null データオブジェクトを世代を指定してダウンロード準備する
     */
    public function getGeneration(): ?string {
        return $this->generation;
    }

    /**
     * 世代を設定
     *
     * @param string $generation データオブジェクトを世代を指定してダウンロード準備する
     */
    public function setGeneration(string $generation = null) {
        $this->generation = $generation;
    }

    /**
     * 世代を設定
     *
     * @param string $generation データオブジェクトを世代を指定してダウンロード準備する
     * @return PrepareDownloadByGenerationRequest $this
     */
    public function withGeneration(string $generation = null): PrepareDownloadByGenerationRequest {
        $this->setGeneration($generation);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null データオブジェクトを世代を指定してダウンロード準備する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider データオブジェクトを世代を指定してダウンロード準備する
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider データオブジェクトを世代を指定してダウンロード準備する
     * @return PrepareDownloadByGenerationRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): PrepareDownloadByGenerationRequest {
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
     * @return PrepareDownloadByGenerationRequest this
     */
    public function withAccessToken(string $accessToken): PrepareDownloadByGenerationRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}