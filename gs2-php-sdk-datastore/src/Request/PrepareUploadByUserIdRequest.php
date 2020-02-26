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
 * ユーザIDを指定してデータオブジェクトをアップロード準備する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareUploadByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してデータオブジェクトをアップロード準備する
     * @return PrepareUploadByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): PrepareUploadByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してデータオブジェクトをアップロード準備する
     * @return PrepareUploadByUserIdRequest $this
     */
    public function withUserId(string $userId): PrepareUploadByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string アップロードするデータの MIME-Type */
    private $contentType;

    /**
     * アップロードするデータの MIME-Typeを取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function getContentType(): ?string {
        return $this->contentType;
    }

    /**
     * アップロードするデータの MIME-Typeを設定
     *
     * @param string $contentType ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function setContentType(string $contentType) {
        $this->contentType = $contentType;
    }

    /**
     * アップロードするデータの MIME-Typeを設定
     *
     * @param string $contentType ユーザIDを指定してデータオブジェクトをアップロード準備する
     * @return PrepareUploadByUserIdRequest $this
     */
    public function withContentType(string $contentType): PrepareUploadByUserIdRequest {
        $this->setContentType($contentType);
        return $this;
    }

    /** @var string ファイルのアクセス権 */
    private $scope;

    /**
     * ファイルのアクセス権を取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function getScope(): ?string {
        return $this->scope;
    }

    /**
     * ファイルのアクセス権を設定
     *
     * @param string $scope ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function setScope(string $scope) {
        $this->scope = $scope;
    }

    /**
     * ファイルのアクセス権を設定
     *
     * @param string $scope ユーザIDを指定してデータオブジェクトをアップロード準備する
     * @return PrepareUploadByUserIdRequest $this
     */
    public function withScope(string $scope): PrepareUploadByUserIdRequest {
        $this->setScope($scope);
        return $this;
    }

    /** @var string[] 公開するユーザIDリスト */
    private $allowUserIds;

    /**
     * 公開するユーザIDリストを取得
     *
     * @return string[]|null ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function getAllowUserIds(): ?array {
        return $this->allowUserIds;
    }

    /**
     * 公開するユーザIDリストを設定
     *
     * @param string[] $allowUserIds ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function setAllowUserIds(array $allowUserIds) {
        $this->allowUserIds = $allowUserIds;
    }

    /**
     * 公開するユーザIDリストを設定
     *
     * @param string[] $allowUserIds ユーザIDを指定してデータオブジェクトをアップロード準備する
     * @return PrepareUploadByUserIdRequest $this
     */
    public function withAllowUserIds(array $allowUserIds): PrepareUploadByUserIdRequest {
        $this->setAllowUserIds($allowUserIds);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してデータオブジェクトをアップロード準備する
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してデータオブジェクトをアップロード準備する
     * @return PrepareUploadByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): PrepareUploadByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}