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

/**
 * フォームを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetFormRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null フォームを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームを取得
     * @return GetFormRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetFormRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォームの保存領域の名前 */
    private $moldName;

    /**
     * フォームの保存領域の名前を取得
     *
     * @return string|null フォームを取得
     */
    public function getMoldName(): ?string {
        return $this->moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName フォームを取得
     */
    public function setMoldName(string $moldName) {
        $this->moldName = $moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName フォームを取得
     * @return GetFormRequest $this
     */
    public function withMoldName(string $moldName): GetFormRequest {
        $this->setMoldName($moldName);
        return $this;
    }

    /** @var int 保存領域のインデックス */
    private $index;

    /**
     * 保存領域のインデックスを取得
     *
     * @return int|null フォームを取得
     */
    public function getIndex(): ?int {
        return $this->index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index フォームを取得
     */
    public function setIndex(int $index) {
        $this->index = $index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index フォームを取得
     * @return GetFormRequest $this
     */
    public function withIndex(int $index): GetFormRequest {
        $this->setIndex($index);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null フォームを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider フォームを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider フォームを取得
     * @return GetFormRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): GetFormRequest {
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
     * @return GetFormRequest this
     */
    public function withAccessToken(string $accessToken): GetFormRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}