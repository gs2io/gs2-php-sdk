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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Showcase\Model\Config;

/**
 * ユーザIDを指定して陳列棚を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class BuyByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定して陳列棚を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して陳列棚を取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して陳列棚を取得
     * @return BuyByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): BuyByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 商品名 */
    private $showcaseName;

    /**
     * 商品名を取得
     *
     * @return string|null ユーザIDを指定して陳列棚を取得
     */
    public function getShowcaseName(): ?string {
        return $this->showcaseName;
    }

    /**
     * 商品名を設定
     *
     * @param string $showcaseName ユーザIDを指定して陳列棚を取得
     */
    public function setShowcaseName(string $showcaseName = null) {
        $this->showcaseName = $showcaseName;
    }

    /**
     * 商品名を設定
     *
     * @param string $showcaseName ユーザIDを指定して陳列棚を取得
     * @return BuyByUserIdRequest $this
     */
    public function withShowcaseName(string $showcaseName = null): BuyByUserIdRequest {
        $this->setShowcaseName($showcaseName);
        return $this;
    }

    /** @var string 陳列商品ID */
    private $displayItemId;

    /**
     * 陳列商品IDを取得
     *
     * @return string|null ユーザIDを指定して陳列棚を取得
     */
    public function getDisplayItemId(): ?string {
        return $this->displayItemId;
    }

    /**
     * 陳列商品IDを設定
     *
     * @param string $displayItemId ユーザIDを指定して陳列棚を取得
     */
    public function setDisplayItemId(string $displayItemId = null) {
        $this->displayItemId = $displayItemId;
    }

    /**
     * 陳列商品IDを設定
     *
     * @param string $displayItemId ユーザIDを指定して陳列棚を取得
     * @return BuyByUserIdRequest $this
     */
    public function withDisplayItemId(string $displayItemId = null): BuyByUserIdRequest {
        $this->setDisplayItemId($displayItemId);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定して陳列棚を取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して陳列棚を取得
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して陳列棚を取得
     * @return BuyByUserIdRequest $this
     */
    public function withUserId(string $userId = null): BuyByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var Config[] 設定値 */
    private $config;

    /**
     * 設定値を取得
     *
     * @return Config[]|null ユーザIDを指定して陳列棚を取得
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config ユーザIDを指定して陳列棚を取得
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config ユーザIDを指定して陳列棚を取得
     * @return BuyByUserIdRequest $this
     */
    public function withConfig(array $config = null): BuyByUserIdRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定して陳列棚を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して陳列棚を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して陳列棚を取得
     * @return BuyByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): BuyByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}