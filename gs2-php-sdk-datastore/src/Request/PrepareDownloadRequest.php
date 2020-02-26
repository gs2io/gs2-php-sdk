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
 * データオブジェクトをダウンロード準備する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareDownloadRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null データオブジェクトをダウンロード準備する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データオブジェクトをダウンロード準備する
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データオブジェクトをダウンロード準備する
     * @return PrepareDownloadRequest $this
     */
    public function withNamespaceName(string $namespaceName): PrepareDownloadRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string データオブジェクト */
    private $dataObjectId;

    /**
     * データオブジェクトを取得
     *
     * @return string|null データオブジェクトをダウンロード準備する
     */
    public function getDataObjectId(): ?string {
        return $this->dataObjectId;
    }

    /**
     * データオブジェクトを設定
     *
     * @param string $dataObjectId データオブジェクトをダウンロード準備する
     */
    public function setDataObjectId(string $dataObjectId) {
        $this->dataObjectId = $dataObjectId;
    }

    /**
     * データオブジェクトを設定
     *
     * @param string $dataObjectId データオブジェクトをダウンロード準備する
     * @return PrepareDownloadRequest $this
     */
    public function withDataObjectId(string $dataObjectId): PrepareDownloadRequest {
        $this->setDataObjectId($dataObjectId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null データオブジェクトをダウンロード準備する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider データオブジェクトをダウンロード準備する
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider データオブジェクトをダウンロード準備する
     * @return PrepareDownloadRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): PrepareDownloadRequest {
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
     * @return PrepareDownloadRequest this
     */
    public function withAccessToken(string $accessToken): PrepareDownloadRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}