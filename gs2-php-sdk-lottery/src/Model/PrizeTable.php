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
 * 排出確率テーブル
 *
 * @author Game Server Services, Inc.
 *
 */
class PrizeTable implements IModel {
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
	 * @return PrizeTable $this
	 */
	public function withPrizeTableId(?string $prizeTableId): PrizeTable {
		$this->prizeTableId = $prizeTableId;
		return $this;
	}
	/**
     * @var string 景品テーブル名
	 */
	protected $name;

	/**
	 * 景品テーブル名を取得
	 *
	 * @return string|null 景品テーブル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 景品テーブル名を設定
	 *
	 * @param string|null $name 景品テーブル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 景品テーブル名を設定
	 *
	 * @param string|null $name 景品テーブル名
	 * @return PrizeTable $this
	 */
	public function withName(?string $name): PrizeTable {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 景品テーブルのメタデータ
	 */
	protected $metadata;

	/**
	 * 景品テーブルのメタデータを取得
	 *
	 * @return string|null 景品テーブルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 景品テーブルのメタデータを設定
	 *
	 * @param string|null $metadata 景品テーブルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 景品テーブルのメタデータを設定
	 *
	 * @param string|null $metadata 景品テーブルのメタデータ
	 * @return PrizeTable $this
	 */
	public function withMetadata(?string $metadata): PrizeTable {
		$this->metadata = $metadata;
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
	 * @return PrizeTable $this
	 */
	public function withPrizes(?array $prizes): PrizeTable {
		$this->prizes = $prizes;
		return $this;
	}

    public function toJson(): array {
        return array(
            "prizeTableId" => $this->prizeTableId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "prizes" => array_map(
                function (Prize $v) {
                    return $v->toJson();
                },
                $this->prizes == null ? [] : $this->prizes
            ),
        );
    }

    public static function fromJson(array $data): PrizeTable {
        $model = new PrizeTable();
        $model->setPrizeTableId(isset($data["prizeTableId"]) ? $data["prizeTableId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setPrizes(array_map(
                function ($v) {
                    return Prize::fromJson($v);
                },
                isset($data["prizes"]) ? $data["prizes"] : []
            )
        );
        return $model;
    }
}