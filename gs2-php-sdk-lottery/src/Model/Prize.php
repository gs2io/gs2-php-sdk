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
 * 景品
 *
 * @author Game Server Services, Inc.
 *
 */
class Prize implements IModel {
	/**
     * @var string 景品ID
	 */
	protected $prizeId;

	/**
	 * 景品IDを取得
	 *
	 * @return string|null 景品ID
	 */
	public function getPrizeId(): ?string {
		return $this->prizeId;
	}

	/**
	 * 景品IDを設定
	 *
	 * @param string|null $prizeId 景品ID
	 */
	public function setPrizeId(?string $prizeId) {
		$this->prizeId = $prizeId;
	}

	/**
	 * 景品IDを設定
	 *
	 * @param string|null $prizeId 景品ID
	 * @return Prize $this
	 */
	public function withPrizeId(?string $prizeId): Prize {
		$this->prizeId = $prizeId;
		return $this;
	}
	/**
     * @var string 景品の種類
	 */
	protected $type;

	/**
	 * 景品の種類を取得
	 *
	 * @return string|null 景品の種類
	 */
	public function getType(): ?string {
		return $this->type;
	}

	/**
	 * 景品の種類を設定
	 *
	 * @param string|null $type 景品の種類
	 */
	public function setType(?string $type) {
		$this->type = $type;
	}

	/**
	 * 景品の種類を設定
	 *
	 * @param string|null $type 景品の種類
	 * @return Prize $this
	 */
	public function withType(?string $type): Prize {
		$this->type = $type;
		return $this;
	}
	/**
     * @var AcquireAction[] 景品の入手アクションリスト
	 */
	protected $acquireActions;

	/**
	 * 景品の入手アクションリストを取得
	 *
	 * @return AcquireAction[]|null 景品の入手アクションリスト
	 */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	/**
	 * 景品の入手アクションリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 景品の入手アクションリスト
	 */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	/**
	 * 景品の入手アクションリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 景品の入手アクションリスト
	 * @return Prize $this
	 */
	public function withAcquireActions(?array $acquireActions): Prize {
		$this->acquireActions = $acquireActions;
		return $this;
	}
	/**
     * @var string 排出確率テーブルの名前
	 */
	protected $prizeTableName;

	/**
	 * 排出確率テーブルの名前を取得
	 *
	 * @return string|null 排出確率テーブルの名前
	 */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}

	/**
	 * 排出確率テーブルの名前を設定
	 *
	 * @param string|null $prizeTableName 排出確率テーブルの名前
	 */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}

	/**
	 * 排出確率テーブルの名前を設定
	 *
	 * @param string|null $prizeTableName 排出確率テーブルの名前
	 * @return Prize $this
	 */
	public function withPrizeTableName(?string $prizeTableName): Prize {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	/**
     * @var int 排出重み
	 */
	protected $weight;

	/**
	 * 排出重みを取得
	 *
	 * @return int|null 排出重み
	 */
	public function getWeight(): ?int {
		return $this->weight;
	}

	/**
	 * 排出重みを設定
	 *
	 * @param int|null $weight 排出重み
	 */
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}

	/**
	 * 排出重みを設定
	 *
	 * @param int|null $weight 排出重み
	 * @return Prize $this
	 */
	public function withWeight(?int $weight): Prize {
		$this->weight = $weight;
		return $this;
	}

    public function toJson(): array {
        return array(
            "prizeId" => $this->prizeId,
            "type" => $this->type,
            "acquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->acquireActions == null ? [] : $this->acquireActions
            ),
            "prizeTableName" => $this->prizeTableName,
            "weight" => $this->weight,
        );
    }

    public static function fromJson(array $data): Prize {
        $model = new Prize();
        $model->setPrizeId(isset($data["prizeId"]) ? $data["prizeId"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["acquireActions"]) ? $data["acquireActions"] : []
            )
        );
        $model->setPrizeTableName(isset($data["prizeTableName"]) ? $data["prizeTableName"] : null);
        $model->setWeight(isset($data["weight"]) ? $data["weight"] : null);
        return $model;
    }
}