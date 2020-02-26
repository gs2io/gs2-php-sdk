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

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザーIDを指定して承認したバージョンを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteAcceptVersionByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定して承認したバージョンを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定して承認したバージョンを削除
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定して承認したバージョンを削除
     * @return DeleteAcceptVersionByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): DeleteAcceptVersionByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定して承認したバージョンを削除
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定して承認したバージョンを削除
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定して承認したバージョンを削除
     * @return DeleteAcceptVersionByUserIdRequest $this
     */
    public function withUserId(string $userId): DeleteAcceptVersionByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 承認したバージョン名 */
    private $versionName;

    /**
     * 承認したバージョン名を取得
     *
     * @return string|null ユーザーIDを指定して承認したバージョンを削除
     */
    public function getVersionName(): ?string {
        return $this->versionName;
    }

    /**
     * 承認したバージョン名を設定
     *
     * @param string $versionName ユーザーIDを指定して承認したバージョンを削除
     */
    public function setVersionName(string $versionName) {
        $this->versionName = $versionName;
    }

    /**
     * 承認したバージョン名を設定
     *
     * @param string $versionName ユーザーIDを指定して承認したバージョンを削除
     * @return DeleteAcceptVersionByUserIdRequest $this
     */
    public function withVersionName(string $versionName): DeleteAcceptVersionByUserIdRequest {
        $this->setVersionName($versionName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定して承認したバージョンを削除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定して承認したバージョンを削除
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定して承認したバージョンを削除
     * @return DeleteAcceptVersionByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DeleteAcceptVersionByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}