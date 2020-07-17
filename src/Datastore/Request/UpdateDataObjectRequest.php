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
 * データオブジェクトを更新する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateDataObjectRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null データオブジェクトを更新する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データオブジェクトを更新する
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName データオブジェクトを更新する
     * @return UpdateDataObjectRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateDataObjectRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string データの名前 */
    private $dataObjectName;

    /**
     * データの名前を取得
     *
     * @return string|null データオブジェクトを更新する
     */
    public function getDataObjectName(): ?string {
        return $this->dataObjectName;
    }

    /**
     * データの名前を設定
     *
     * @param string $dataObjectName データオブジェクトを更新する
     */
    public function setDataObjectName(string $dataObjectName = null) {
        $this->dataObjectName = $dataObjectName;
    }

    /**
     * データの名前を設定
     *
     * @param string $dataObjectName データオブジェクトを更新する
     * @return UpdateDataObjectRequest $this
     */
    public function withDataObjectName(string $dataObjectName = null): UpdateDataObjectRequest {
        $this->setDataObjectName($dataObjectName);
        return $this;
    }

    /** @var string ファイルのアクセス権 */
    private $scope;

    /**
     * ファイルのアクセス権を取得
     *
     * @return string|null データオブジェクトを更新する
     */
    public function getScope(): ?string {
        return $this->scope;
    }

    /**
     * ファイルのアクセス権を設定
     *
     * @param string $scope データオブジェクトを更新する
     */
    public function setScope(string $scope = null) {
        $this->scope = $scope;
    }

    /**
     * ファイルのアクセス権を設定
     *
     * @param string $scope データオブジェクトを更新する
     * @return UpdateDataObjectRequest $this
     */
    public function withScope(string $scope = null): UpdateDataObjectRequest {
        $this->setScope($scope);
        return $this;
    }

    /** @var string[] 公開するユーザIDリスト */
    private $allowUserIds;

    /**
     * 公開するユーザIDリストを取得
     *
     * @return string[]|null データオブジェクトを更新する
     */
    public function getAllowUserIds(): ?array {
        return $this->allowUserIds;
    }

    /**
     * 公開するユーザIDリストを設定
     *
     * @param string[] $allowUserIds データオブジェクトを更新する
     */
    public function setAllowUserIds(array $allowUserIds = null) {
        $this->allowUserIds = $allowUserIds;
    }

    /**
     * 公開するユーザIDリストを設定
     *
     * @param string[] $allowUserIds データオブジェクトを更新する
     * @return UpdateDataObjectRequest $this
     */
    public function withAllowUserIds(array $allowUserIds = null): UpdateDataObjectRequest {
        $this->setAllowUserIds($allowUserIds);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null データオブジェクトを更新する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider データオブジェクトを更新する
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider データオブジェクトを更新する
     * @return UpdateDataObjectRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): UpdateDataObjectRequest {
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
     * @return UpdateDataObjectRequest this
     */
    public function withAccessToken(string $accessToken): UpdateDataObjectRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}