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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * クエストモデルマスターの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeQuestModelMastersRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストモデルマスターの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターの一覧を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストモデルマスターの一覧を取得
     * @return DescribeQuestModelMastersRequest $this
     */
    public function withNamespaceName(string $namespaceName): DescribeQuestModelMastersRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string クエストグループモデル名 */
    private $questGroupName;

    /**
     * クエストグループモデル名を取得
     *
     * @return string|null クエストモデルマスターの一覧を取得
     */
    public function getQuestGroupName(): ?string {
        return $this->questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターの一覧を取得
     */
    public function setQuestGroupName(string $questGroupName) {
        $this->questGroupName = $questGroupName;
    }

    /**
     * クエストグループモデル名を設定
     *
     * @param string $questGroupName クエストモデルマスターの一覧を取得
     * @return DescribeQuestModelMastersRequest $this
     */
    public function withQuestGroupName(string $questGroupName): DescribeQuestModelMastersRequest {
        $this->setQuestGroupName($questGroupName);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null クエストモデルマスターの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken クエストモデルマスターの一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken クエストモデルマスターの一覧を取得
     * @return DescribeQuestModelMastersRequest $this
     */
    public function withPageToken(string $pageToken): DescribeQuestModelMastersRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null クエストモデルマスターの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit クエストモデルマスターの一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit クエストモデルマスターの一覧を取得
     * @return DescribeQuestModelMastersRequest $this
     */
    public function withLimit(int $limit): DescribeQuestModelMastersRequest {
        $this->setLimit($limit);
        return $this;
    }

}