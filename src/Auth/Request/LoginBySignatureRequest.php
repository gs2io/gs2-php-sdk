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

namespace Gs2\Auth\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 指定したユーザIDでGS2にログインし、アクセストークンを取得します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class LoginBySignatureRequest extends Gs2BasicRequest {

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginBySignatureRequest $this
     */
    public function withUserId(string $userId = null): LoginBySignatureRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 署名の作成に使用した暗号鍵 のGRN */
    private $keyId;

    /**
     * 署名の作成に使用した暗号鍵 のGRNを取得
     *
     * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 署名の作成に使用した暗号鍵 のGRNを設定
     *
     * @param string $keyId 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 署名の作成に使用した暗号鍵 のGRNを設定
     *
     * @param string $keyId 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginBySignatureRequest $this
     */
    public function withKeyId(string $keyId = null): LoginBySignatureRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string アカウント認証情報の署名対象 */
    private $body;

    /**
     * アカウント認証情報の署名対象を取得
     *
     * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getBody(): ?string {
        return $this->body;
    }

    /**
     * アカウント認証情報の署名対象を設定
     *
     * @param string $body 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setBody(string $body = null) {
        $this->body = $body;
    }

    /**
     * アカウント認証情報の署名対象を設定
     *
     * @param string $body 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginBySignatureRequest $this
     */
    public function withBody(string $body = null): LoginBySignatureRequest {
        $this->setBody($body);
        return $this;
    }

    /** @var string 署名 */
    private $signature;

    /**
     * 署名を取得
     *
     * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getSignature(): ?string {
        return $this->signature;
    }

    /**
     * 署名を設定
     *
     * @param string $signature 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setSignature(string $signature = null) {
        $this->signature = $signature;
    }

    /**
     * 署名を設定
     *
     * @param string $signature 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginBySignatureRequest $this
     */
    public function withSignature(string $signature = null): LoginBySignatureRequest {
        $this->setSignature($signature);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginBySignatureRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): LoginBySignatureRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}