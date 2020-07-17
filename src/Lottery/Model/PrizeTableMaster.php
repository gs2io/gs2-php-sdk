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
 * 排出確率テーブルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class PrizeTableMaster implements IModel {
	/**
     * @var string 排出確率テーブルマスター
	 */
	protected $prizeTableId;

	/**
	 * 排出確率テーブルマスターを取得
	 *
	 * @return string|null 排出確率テーブルマスター
	 */
	public function getPrizeTableId(): ?string {
		return $this->prizeTableId;
	}

	/**
	 * 排出確率テーブルマスターを設定
	 *
	 * @param string|null $prizeTableId 排出確率テーブルマスター
	 */
	public function setPrizeTableId(?string $prizeTableId) {
		$this->prizeTableId = $prizeTableId;
	}

	/**
	 * 排出確率テーブルマスターを設定
	 *
	 * @param string|null $prizeTableId 排出確率テーブルマスター
	 * @return PrizeTableMaster $this
	 */
	public function withPrizeTableId(?string $prizeTableId): PrizeTableMaster {
		$this->prizeTableId = $prizeTableId;
		return $this;
	}
	/**
     * @var string 排出確率テーブル名
	 */
	protected $name;

	/**
	 * 排出確率テーブル名を取得
	 *
	 * @return string|null 排出確率テーブル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string|null $name 排出確率テーブル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string|null $name 排出確率テーブル名
	 * @return PrizeTableMaster $this
	 */
	public function withName(?string $name): PrizeTableMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 排出確率テーブルのメタデータ
	 */
	protected $metadata;

	/**
	 * 排出確率テーブルのメタデータを取得
	 *
	 * @return string|null 排出確率テーブルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 排出確率テーブルのメタデータを設定
	 *
	 * @param string|null $metadata 排出確率テーブルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 排出確率テーブルのメタデータを設定
	 *
	 * @param string|null $metadata 排出確率テーブルのメタデータ
	 * @return PrizeTableMaster $this
	 */
	public function withMetadata(?string $metadata): PrizeTableMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string 排出確率テーブルマスターの説明
	 */
	protected $description;

	/**
	 * 排出確率テーブルマスターの説明を取得
	 *
	 * @return string|null 排出確率テーブルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 排出確率テーブルマスターの説明を設定
	 *
	 * @param string|null $description 排出確率テーブルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 排出確率テーブルマスターの説明を設定
	 *
	 * @param string|null $description 排出確率テーブルマスターの説明
	 * @return PrizeTableMaster $this
	 */
	public function withDescription(?string $description): PrizeTableMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var Prize[] 景品リスト
	 */
	protected $prizes;

	/**
	 * 景品リストを取得
	 *
	 * @return Prize[]|null 景品リスト
	 */
	public function getPrizes(): ?array {
		return $this->prizes;
	}

	/**
	 * 景品リストを設定
	 *
	 * @param Prize[]|null $prizes 景品リスト
	 */
	public function setPrizes(?array $prizes) {
		$this->prizes = $prizes;
	}

	/**
	 * 景品リストを設定
	 *
	 * @param Prize[]|null $prizes 景品リスト
	 * @return PrizeTableMaster $this
	 */
	public function withPrizes(?array $prizes): PrizeTableMaster {
		$this->prizes = $prizes;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return PrizeTableMaster $this
	 */
	public function withCreatedAt(?int $createdAt): PrizeTableMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return PrizeTableMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): PrizeTableMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "prizeTableId" => $this->prizeTableId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "prizes" => array_map(
                function (Prize $v) {
                    return $v->toJson();
                },
                $this->prizes == null ? [] : $this->prizes
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): PrizeTableMaster {
        $model = new PrizeTableMaster();
        $model->setPrizeTableId(isset($data["prizeTableId"]) ? $data["prizeTableId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setPrizes(array_map(
                function ($v) {
                    return Prize::fromJson($v);
                },
                isset($data["prizes"]) ? $data["prizes"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}