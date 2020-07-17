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
use Gs2\Version\Model\TargetVersion;

/**
 * バージョンチェック のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CheckVersionByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null バージョンチェック
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョンチェック
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョンチェック
     * @return CheckVersionByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CheckVersionByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null バージョンチェック
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId バージョンチェック
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId バージョンチェック
     * @return CheckVersionByUserIdRequest $this
     */
    public function withUserId(string $userId = null): CheckVersionByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var TargetVersion[] 加算するリソース */
    private $targetVersions;

    /**
     * 加算するリソースを取得
     *
     * @return TargetVersion[]|null バージョンチェック
     */
    public function getTargetVersions(): ?array {
        return $this->targetVersions;
    }

    /**
     * 加算するリソースを設定
     *
     * @param TargetVersion[] $targetVersions バージョンチェック
     */
    public function setTargetVersions(array $targetVersions = null) {
        $this->targetVersions = $targetVersions;
    }

    /**
     * 加算するリソースを設定
     *
     * @param TargetVersion[] $targetVersions バージョンチェック
     * @return CheckVersionByUserIdRequest $this
     */
    public function withTargetVersions(array $targetVersions = null): CheckVersionByUserIdRequest {
        $this->setTargetVersions($targetVersions);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null バージョンチェック
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider バージョンチェック
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider バージョンチェック
     * @return CheckVersionByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): CheckVersionByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}