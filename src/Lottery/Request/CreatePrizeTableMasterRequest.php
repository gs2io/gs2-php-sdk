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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Lottery\Model\Prize;

/**
 * 排出確率テーブルマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreatePrizeTableMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 排出確率テーブルマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 排出確率テーブルマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 排出確率テーブルマスターを新規作成
     * @return CreatePrizeTableMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreatePrizeTableMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 排出確率テーブル名 */
    private $name;

    /**
     * 排出確率テーブル名を取得
     *
     * @return string|null 排出確率テーブルマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 排出確率テーブル名を設定
     *
     * @param string $name 排出確率テーブルマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * 排出確率テーブル名を設定
     *
     * @param string $name 排出確率テーブルマスターを新規作成
     * @return CreatePrizeTableMasterRequest $this
     */
    public function withName(string $name = null): CreatePrizeTableMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 排出確率テーブルマスターの説明 */
    private $description;

    /**
     * 排出確率テーブルマスターの説明を取得
     *
     * @return string|null 排出確率テーブルマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 排出確率テーブルマスターの説明を設定
     *
     * @param string $description 排出確率テーブルマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 排出確率テーブルマスターの説明を設定
     *
     * @param string $description 排出確率テーブルマスターを新規作成
     * @return CreatePrizeTableMasterRequest $this
     */
    public function withDescription(string $description = null): CreatePrizeTableMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 排出確率テーブルのメタデータ */
    private $metadata;

    /**
     * 排出確率テーブルのメタデータを取得
     *
     * @return string|null 排出確率テーブルマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 排出確率テーブルのメタデータを設定
     *
     * @param string $metadata 排出確率テーブルマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * 排出確率テーブルのメタデータを設定
     *
     * @param string $metadata 排出確率テーブルマスターを新規作成
     * @return CreatePrizeTableMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreatePrizeTableMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var Prize[] 景品リスト */
    private $prizes;

    /**
     * 景品リストを取得
     *
     * @return Prize[]|null 排出確率テーブルマスターを新規作成
     */
    public function getPrizes(): ?array {
        return $this->prizes;
    }

    /**
     * 景品リストを設定
     *
     * @param Prize[] $prizes 排出確率テーブルマスターを新規作成
     */
    public function setPrizes(array $prizes = null) {
        $this->prizes = $prizes;
    }

    /**
     * 景品リストを設定
     *
     * @param Prize[] $prizes 排出確率テーブルマスターを新規作成
     * @return CreatePrizeTableMasterRequest $this
     */
    public function withPrizes(array $prizes = null): CreatePrizeTableMasterRequest {
        $this->setPrizes($prizes);
        return $this;
    }

}