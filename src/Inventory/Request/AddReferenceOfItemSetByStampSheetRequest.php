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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタンプシートでアイテムに参照元を追加 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AddReferenceOfItemSetByStampSheetRequest extends Gs2BasicRequest {

    /** @var string スタンプシート */
    private $stampSheet;

    /**
     * スタンプシートを取得
     *
     * @return string|null スタンプシートでアイテムに参照元を追加
     */
    public function getStampSheet(): ?string {
        return $this->stampSheet;
    }

    /**
     * スタンプシートを設定
     *
     * @param string $stampSheet スタンプシートでアイテムに参照元を追加
     */
    public function setStampSheet(string $stampSheet = null) {
        $this->stampSheet = $stampSheet;
    }

    /**
     * スタンプシートを設定
     *
     * @param string $stampSheet スタンプシートでアイテムに参照元を追加
     * @return AddReferenceOfItemSetByStampSheetRequest $this
     */
    public function withStampSheet(string $stampSheet = null): AddReferenceOfItemSetByStampSheetRequest {
        $this->setStampSheet($stampSheet);
        return $this;
    }

    /** @var string スタンプシートの署名検証に使用する 暗号鍵 のGRN */
    private $keyId;

    /**
     * スタンプシートの署名検証に使用する 暗号鍵 のGRNを取得
     *
     * @return string|null スタンプシートでアイテムに参照元を追加
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * スタンプシートの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプシートでアイテムに参照元を追加
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプシートの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプシートでアイテムに参照元を追加
     * @return AddReferenceOfItemSetByStampSheetRequest $this
     */
    public function withKeyId(string $keyId = null): AddReferenceOfItemSetByStampSheetRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプシートでアイテムに参照元を追加
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートでアイテムに参照元を追加
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートでアイテムに参照元を追加
     * @return AddReferenceOfItemSetByStampSheetRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): AddReferenceOfItemSetByStampSheetRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}