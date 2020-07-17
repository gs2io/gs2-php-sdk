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
 * ユーザIDを指定してエントリーを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEntryWithSignatureByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してエントリーを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してエントリーを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してエントリーを取得
     * @return GetEntryWithSignatureByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetEntryWithSignatureByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してエントリーを取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してエントリーを取得
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してエントリーを取得
     * @return GetEntryWithSignatureByUserIdRequest $this
     */
    public function withUserId(string $userId = null): GetEntryWithSignatureByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string エントリー名 */
    private $entryModelName;

    /**
     * エントリー名を取得
     *
     * @return string|null ユーザIDを指定してエントリーを取得
     */
    public function getEntryModelName(): ?string {
        return $this->entryModelName;
    }

    /**
     * エントリー名を設定
     *
     * @param string $entryModelName ユーザIDを指定してエントリーを取得
     */
    public function setEntryModelName(string $entryModelName = null) {
        $this->entryModelName = $entryModelName;
    }

    /**
     * エントリー名を設定
     *
     * @param string $entryModelName ユーザIDを指定してエントリーを取得
     * @return GetEntryWithSignatureByUserIdRequest $this
     */
    public function withEntryModelName(string $entryModelName = null): GetEntryWithSignatureByUserIdRequest {
        $this->setEntryModelName($entryModelName);
        return $this;
    }

    /** @var string 署名の発行に使用する暗号鍵 のGRN */
    private $keyId;

    /**
     * 署名の発行に使用する暗号鍵 のGRNを取得
     *
     * @return string|null ユーザIDを指定してエントリーを取得
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 署名の発行に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId ユーザIDを指定してエントリーを取得
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 署名の発行に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId ユーザIDを指定してエントリーを取得
     * @return GetEntryWithSignatureByUserIdRequest $this
     */
    public function withKeyId(string $keyId = null): GetEntryWithSignatureByUserIdRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してエントリーを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してエントリーを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してエントリーを取得
     * @return GetEntryWithSignatureByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetEntryWithSignatureByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}