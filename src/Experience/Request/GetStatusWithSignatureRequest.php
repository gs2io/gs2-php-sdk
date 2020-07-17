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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ステータスを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetStatusWithSignatureRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ステータスを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ステータスを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ステータスを取得
     * @return GetStatusWithSignatureRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetStatusWithSignatureRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 経験値の種類の名前 */
    private $experienceName;

    /**
     * 経験値の種類の名前を取得
     *
     * @return string|null ステータスを取得
     */
    public function getExperienceName(): ?string {
        return $this->experienceName;
    }

    /**
     * 経験値の種類の名前を設定
     *
     * @param string $experienceName ステータスを取得
     */
    public function setExperienceName(string $experienceName = null) {
        $this->experienceName = $experienceName;
    }

    /**
     * 経験値の種類の名前を設定
     *
     * @param string $experienceName ステータスを取得
     * @return GetStatusWithSignatureRequest $this
     */
    public function withExperienceName(string $experienceName = null): GetStatusWithSignatureRequest {
        $this->setExperienceName($experienceName);
        return $this;
    }

    /** @var string プロパティID */
    private $propertyId;

    /**
     * プロパティIDを取得
     *
     * @return string|null ステータスを取得
     */
    public function getPropertyId(): ?string {
        return $this->propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ステータスを取得
     */
    public function setPropertyId(string $propertyId = null) {
        $this->propertyId = $propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ステータスを取得
     * @return GetStatusWithSignatureRequest $this
     */
    public function withPropertyId(string $propertyId = null): GetStatusWithSignatureRequest {
        $this->setPropertyId($propertyId);
        return $this;
    }

    /** @var string 署名の作成に使用する 暗号鍵 のGRN */
    private $keyId;

    /**
     * 署名の作成に使用する 暗号鍵 のGRNを取得
     *
     * @return string|null ステータスを取得
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 署名の作成に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId ステータスを取得
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 署名の作成に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId ステータスを取得
     * @return GetStatusWithSignatureRequest $this
     */
    public function withKeyId(string $keyId = null): GetStatusWithSignatureRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ステータスを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ステータスを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ステータスを取得
     * @return GetStatusWithSignatureRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetStatusWithSignatureRequest {
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
     * @return GetStatusWithSignatureRequest this
     */
    public function withAccessToken(string $accessToken): GetStatusWithSignatureRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}