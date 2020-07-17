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
 * アイテムモデルマスターの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeItemModelMastersRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null アイテムモデルマスターの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムモデルマスターの一覧を取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムモデルマスターの一覧を取得
     * @return DescribeItemModelMastersRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DescribeItemModelMastersRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string アイテムの種類名 */
    private $inventoryName;

    /**
     * アイテムの種類名を取得
     *
     * @return string|null アイテムモデルマスターの一覧を取得
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * アイテムの種類名を設定
     *
     * @param string $inventoryName アイテムモデルマスターの一覧を取得
     */
    public function setInventoryName(string $inventoryName = null) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * アイテムの種類名を設定
     *
     * @param string $inventoryName アイテムモデルマスターの一覧を取得
     * @return DescribeItemModelMastersRequest $this
     */
    public function withInventoryName(string $inventoryName = null): DescribeItemModelMastersRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null アイテムモデルマスターの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken アイテムモデルマスターの一覧を取得
     */
    public function setPageToken(string $pageToken = null) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken アイテムモデルマスターの一覧を取得
     * @return DescribeItemModelMastersRequest $this
     */
    public function withPageToken(string $pageToken = null): DescribeItemModelMastersRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null アイテムモデルマスターの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit アイテムモデルマスターの一覧を取得
     */
    public function setLimit(int $limit = null) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit アイテムモデルマスターの一覧を取得
     * @return DescribeItemModelMastersRequest $this
     */
    public function withLimit(int $limit = null): DescribeItemModelMastersRequest {
        $this->setLimit($limit);
        return $this;
    }

}