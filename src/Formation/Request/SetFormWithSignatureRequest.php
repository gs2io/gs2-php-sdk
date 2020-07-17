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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\SlotWithSignature;

/**
 * 署名付きスロットを使ってフォームを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SetFormWithSignatureRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 署名付きスロットを使ってフォームを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 署名付きスロットを使ってフォームを更新
     * @return SetFormWithSignatureRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): SetFormWithSignatureRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォームの保存領域の名前 */
    private $moldName;

    /**
     * フォームの保存領域の名前を取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getMoldName(): ?string {
        return $this->moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName 署名付きスロットを使ってフォームを更新
     */
    public function setMoldName(string $moldName = null) {
        $this->moldName = $moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName 署名付きスロットを使ってフォームを更新
     * @return SetFormWithSignatureRequest $this
     */
    public function withMoldName(string $moldName = null): SetFormWithSignatureRequest {
        $this->setMoldName($moldName);
        return $this;
    }

    /** @var int 保存領域のインデックス */
    private $index;

    /**
     * 保存領域のインデックスを取得
     *
     * @return int|null 署名付きスロットを使ってフォームを更新
     */
    public function getIndex(): ?int {
        return $this->index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index 署名付きスロットを使ってフォームを更新
     */
    public function setIndex(int $index = null) {
        $this->index = $index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index 署名付きスロットを使ってフォームを更新
     * @return SetFormWithSignatureRequest $this
     */
    public function withIndex(int $index = null): SetFormWithSignatureRequest {
        $this->setIndex($index);
        return $this;
    }

    /** @var SlotWithSignature[] 編成するスロットのリスト */
    private $slots;

    /**
     * 編成するスロットのリストを取得
     *
     * @return SlotWithSignature[]|null 署名付きスロットを使ってフォームを更新
     */
    public function getSlots(): ?array {
        return $this->slots;
    }

    /**
     * 編成するスロットのリストを設定
     *
     * @param SlotWithSignature[] $slots 署名付きスロットを使ってフォームを更新
     */
    public function setSlots(array $slots = null) {
        $this->slots = $slots;
    }

    /**
     * 編成するスロットのリストを設定
     *
     * @param SlotWithSignature[] $slots 署名付きスロットを使ってフォームを更新
     * @return SetFormWithSignatureRequest $this
     */
    public function withSlots(array $slots = null): SetFormWithSignatureRequest {
        $this->setSlots($slots);
        return $this;
    }

    /** @var string 署名の発行に使用した GS2-Key の暗号鍵GRN */
    private $keyId;

    /**
     * 署名の発行に使用した GS2-Key の暗号鍵GRNを取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 署名の発行に使用した GS2-Key の暗号鍵GRNを設定
     *
     * @param string $keyId 署名付きスロットを使ってフォームを更新
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 署名の発行に使用した GS2-Key の暗号鍵GRNを設定
     *
     * @param string $keyId 署名付きスロットを使ってフォームを更新
     * @return SetFormWithSignatureRequest $this
     */
    public function withKeyId(string $keyId = null): SetFormWithSignatureRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 署名付きスロットを使ってフォームを更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 署名付きスロットを使ってフォームを更新
     * @return SetFormWithSignatureRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): SetFormWithSignatureRequest {
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
     * @return SetFormWithSignatureRequest this
     */
    public function withAccessToken(string $accessToken): SetFormWithSignatureRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}