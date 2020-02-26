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

/**
 * 抽選の種類マスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateLotteryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 抽選の種類マスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateLotteryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 抽選モデルの種類名 */
    private $name;

    /**
     * 抽選モデルの種類名を取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 抽選モデルの種類名を設定
     *
     * @param string $name 抽選の種類マスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * 抽選モデルの種類名を設定
     *
     * @param string $name 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withName(string $name): CreateLotteryModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 抽選の種類マスターの説明 */
    private $description;

    /**
     * 抽選の種類マスターの説明を取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 抽選の種類マスターの説明を設定
     *
     * @param string $description 抽選の種類マスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 抽選の種類マスターの説明を設定
     *
     * @param string $description 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withDescription(string $description): CreateLotteryModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 抽選モデルの種類のメタデータ */
    private $metadata;

    /**
     * 抽選モデルの種類のメタデータを取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 抽選モデルの種類のメタデータを設定
     *
     * @param string $metadata 抽選の種類マスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 抽選モデルの種類のメタデータを設定
     *
     * @param string $metadata 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateLotteryModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 抽選モード */
    private $mode;

    /**
     * 抽選モードを取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getMode(): ?string {
        return $this->mode;
    }

    /**
     * 抽選モードを設定
     *
     * @param string $mode 抽選の種類マスターを新規作成
     */
    public function setMode(string $mode) {
        $this->mode = $mode;
    }

    /**
     * 抽選モードを設定
     *
     * @param string $mode 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withMode(string $mode): CreateLotteryModelMasterRequest {
        $this->setMode($mode);
        return $this;
    }

    /** @var string 抽選方法 */
    private $method;

    /**
     * 抽選方法を取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getMethod(): ?string {
        return $this->method;
    }

    /**
     * 抽選方法を設定
     *
     * @param string $method 抽選の種類マスターを新規作成
     */
    public function setMethod(string $method) {
        $this->method = $method;
    }

    /**
     * 抽選方法を設定
     *
     * @param string $method 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withMethod(string $method): CreateLotteryModelMasterRequest {
        $this->setMethod($method);
        return $this;
    }

    /** @var string 景品テーブルの名前 */
    private $prizeTableName;

    /**
     * 景品テーブルの名前を取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getPrizeTableName(): ?string {
        return $this->prizeTableName;
    }

    /**
     * 景品テーブルの名前を設定
     *
     * @param string $prizeTableName 抽選の種類マスターを新規作成
     */
    public function setPrizeTableName(string $prizeTableName) {
        $this->prizeTableName = $prizeTableName;
    }

    /**
     * 景品テーブルの名前を設定
     *
     * @param string $prizeTableName 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withPrizeTableName(string $prizeTableName): CreateLotteryModelMasterRequest {
        $this->setPrizeTableName($prizeTableName);
        return $this;
    }

    /** @var string 抽選テーブルを確定するスクリプト のGRN */
    private $choicePrizeTableScriptId;

    /**
     * 抽選テーブルを確定するスクリプト のGRNを取得
     *
     * @return string|null 抽選の種類マスターを新規作成
     */
    public function getChoicePrizeTableScriptId(): ?string {
        return $this->choicePrizeTableScriptId;
    }

    /**
     * 抽選テーブルを確定するスクリプト のGRNを設定
     *
     * @param string $choicePrizeTableScriptId 抽選の種類マスターを新規作成
     */
    public function setChoicePrizeTableScriptId(string $choicePrizeTableScriptId) {
        $this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
    }

    /**
     * 抽選テーブルを確定するスクリプト のGRNを設定
     *
     * @param string $choicePrizeTableScriptId 抽選の種類マスターを新規作成
     * @return CreateLotteryModelMasterRequest $this
     */
    public function withChoicePrizeTableScriptId(string $choicePrizeTableScriptId): CreateLotteryModelMasterRequest {
        $this->setChoicePrizeTableScriptId($choicePrizeTableScriptId);
        return $this;
    }

}