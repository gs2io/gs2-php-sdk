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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;

/**
 * 抽選の種類
 *
 * @author Game Server Services, Inc.
 *
 */
class LotteryModel implements IModel {
	/**
     * @var string 抽選の種類マスター
	 */
	protected $lotteryModelId;

	/**
	 * 抽選の種類マスターを取得
	 *
	 * @return string|null 抽選の種類マスター
	 */
	public function getLotteryModelId(): ?string {
		return $this->lotteryModelId;
	}

	/**
	 * 抽選の種類マスターを設定
	 *
	 * @param string|null $lotteryModelId 抽選の種類マスター
	 */
	public function setLotteryModelId(?string $lotteryModelId) {
		$this->lotteryModelId = $lotteryModelId;
	}

	/**
	 * 抽選の種類マスターを設定
	 *
	 * @param string|null $lotteryModelId 抽選の種類マスター
	 * @return LotteryModel $this
	 */
	public function withLotteryModelId(?string $lotteryModelId): LotteryModel {
		$this->lotteryModelId = $lotteryModelId;
		return $this;
	}
	/**
     * @var string 抽選モデルの種類名
	 */
	protected $name;

	/**
	 * 抽選モデルの種類名を取得
	 *
	 * @return string|null 抽選モデルの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 抽選モデルの種類名を設定
	 *
	 * @param string|null $name 抽選モデルの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 抽選モデルの種類名を設定
	 *
	 * @param string|null $name 抽選モデルの種類名
	 * @return LotteryModel $this
	 */
	public function withName(?string $name): LotteryModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 抽選モデルの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * 抽選モデルの種類のメタデータを取得
	 *
	 * @return string|null 抽選モデルの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 抽選モデルの種類のメタデータを設定
	 *
	 * @param string|null $metadata 抽選モデルの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 抽選モデルの種類のメタデータを設定
	 *
	 * @param string|null $metadata 抽選モデルの種類のメタデータ
	 * @return LotteryModel $this
	 */
	public function withMetadata(?string $metadata): LotteryModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string 抽選モード
	 */
	protected $mode;

	/**
	 * 抽選モードを取得
	 *
	 * @return string|null 抽選モード
	 */
	public function getMode(): ?string {
		return $this->mode;
	}

	/**
	 * 抽選モードを設定
	 *
	 * @param string|null $mode 抽選モード
	 */
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}

	/**
	 * 抽選モードを設定
	 *
	 * @param string|null $mode 抽選モード
	 * @return LotteryModel $this
	 */
	public function withMode(?string $mode): LotteryModel {
		$this->mode = $mode;
		return $this;
	}
	/**
     * @var string 抽選方法
	 */
	protected $method;

	/**
	 * 抽選方法を取得
	 *
	 * @return string|null 抽選方法
	 */
	public function getMethod(): ?string {
		return $this->method;
	}

	/**
	 * 抽選方法を設定
	 *
	 * @param string|null $method 抽選方法
	 */
	public function setMethod(?string $method) {
		$this->method = $method;
	}

	/**
	 * 抽選方法を設定
	 *
	 * @param string|null $method 抽選方法
	 * @return LotteryModel $this
	 */
	public function withMethod(?string $method): LotteryModel {
		$this->method = $method;
		return $this;
	}
	/**
     * @var string 景品テーブルの名前
	 */
	protected $prizeTableName;

	/**
	 * 景品テーブルの名前を取得
	 *
	 * @return string|null 景品テーブルの名前
	 */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}

	/**
	 * 景品テーブルの名前を設定
	 *
	 * @param string|null $prizeTableName 景品テーブルの名前
	 */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}

	/**
	 * 景品テーブルの名前を設定
	 *
	 * @param string|null $prizeTableName 景品テーブルの名前
	 * @return LotteryModel $this
	 */
	public function withPrizeTableName(?string $prizeTableName): LotteryModel {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	/**
     * @var string 抽選テーブルを確定するスクリプト のGRN
	 */
	protected $choicePrizeTableScriptId;

	/**
	 * 抽選テーブルを確定するスクリプト のGRNを取得
	 *
	 * @return string|null 抽選テーブルを確定するスクリプト のGRN
	 */
	public function getChoicePrizeTableScriptId(): ?string {
		return $this->choicePrizeTableScriptId;
	}

	/**
	 * 抽選テーブルを確定するスクリプト のGRNを設定
	 *
	 * @param string|null $choicePrizeTableScriptId 抽選テーブルを確定するスクリプト のGRN
	 */
	public function setChoicePrizeTableScriptId(?string $choicePrizeTableScriptId) {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
	}

	/**
	 * 抽選テーブルを確定するスクリプト のGRNを設定
	 *
	 * @param string|null $choicePrizeTableScriptId 抽選テーブルを確定するスクリプト のGRN
	 * @return LotteryModel $this
	 */
	public function withChoicePrizeTableScriptId(?string $choicePrizeTableScriptId): LotteryModel {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "lotteryModelId" => $this->lotteryModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "mode" => $this->mode,
            "method" => $this->method,
            "prizeTableName" => $this->prizeTableName,
            "choicePrizeTableScriptId" => $this->choicePrizeTableScriptId,
        );
    }

    public static function fromJson(array $data): LotteryModel {
        $model = new LotteryModel();
        $model->setLotteryModelId(isset($data["lotteryModelId"]) ? $data["lotteryModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setMode(isset($data["mode"]) ? $data["mode"] : null);
        $model->setMethod(isset($data["method"]) ? $data["method"] : null);
        $model->setPrizeTableName(isset($data["prizeTableName"]) ? $data["prizeTableName"] : null);
        $model->setChoicePrizeTableScriptId(isset($data["choicePrizeTableScriptId"]) ? $data["choicePrizeTableScriptId"] : null);
        return $model;
    }
}