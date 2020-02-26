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

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;

/**
 * スタミナ回復間隔テーブルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class RecoverIntervalTableMaster implements IModel {
	/**
     * @var string スタミナ回復間隔テーブルマスター
	 */
	protected $recoverIntervalTableId;

	/**
	 * スタミナ回復間隔テーブルマスターを取得
	 *
	 * @return string|null スタミナ回復間隔テーブルマスター
	 */
	public function getRecoverIntervalTableId(): ?string {
		return $this->recoverIntervalTableId;
	}

	/**
	 * スタミナ回復間隔テーブルマスターを設定
	 *
	 * @param string|null $recoverIntervalTableId スタミナ回復間隔テーブルマスター
	 */
	public function setRecoverIntervalTableId(?string $recoverIntervalTableId) {
		$this->recoverIntervalTableId = $recoverIntervalTableId;
	}

	/**
	 * スタミナ回復間隔テーブルマスターを設定
	 *
	 * @param string|null $recoverIntervalTableId スタミナ回復間隔テーブルマスター
	 * @return RecoverIntervalTableMaster $this
	 */
	public function withRecoverIntervalTableId(?string $recoverIntervalTableId): RecoverIntervalTableMaster {
		$this->recoverIntervalTableId = $recoverIntervalTableId;
		return $this;
	}
	/**
     * @var string スタミナ回復間隔テーブル名
	 */
	protected $name;

	/**
	 * スタミナ回復間隔テーブル名を取得
	 *
	 * @return string|null スタミナ回復間隔テーブル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * スタミナ回復間隔テーブル名を設定
	 *
	 * @param string|null $name スタミナ回復間隔テーブル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * スタミナ回復間隔テーブル名を設定
	 *
	 * @param string|null $name スタミナ回復間隔テーブル名
	 * @return RecoverIntervalTableMaster $this
	 */
	public function withName(?string $name): RecoverIntervalTableMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string スタミナ回復間隔テーブルのメタデータ
	 */
	protected $metadata;

	/**
	 * スタミナ回復間隔テーブルのメタデータを取得
	 *
	 * @return string|null スタミナ回復間隔テーブルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * スタミナ回復間隔テーブルのメタデータを設定
	 *
	 * @param string|null $metadata スタミナ回復間隔テーブルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * スタミナ回復間隔テーブルのメタデータを設定
	 *
	 * @param string|null $metadata スタミナ回復間隔テーブルのメタデータ
	 * @return RecoverIntervalTableMaster $this
	 */
	public function withMetadata(?string $metadata): RecoverIntervalTableMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string スタミナ回復間隔テーブルマスターの説明
	 */
	protected $description;

	/**
	 * スタミナ回復間隔テーブルマスターの説明を取得
	 *
	 * @return string|null スタミナ回復間隔テーブルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * スタミナ回復間隔テーブルマスターの説明を設定
	 *
	 * @param string|null $description スタミナ回復間隔テーブルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * スタミナ回復間隔テーブルマスターの説明を設定
	 *
	 * @param string|null $description スタミナ回復間隔テーブルマスターの説明
	 * @return RecoverIntervalTableMaster $this
	 */
	public function withDescription(?string $description): RecoverIntervalTableMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 経験値の種類マスター のGRN
	 */
	protected $experienceModelId;

	/**
	 * 経験値の種類マスター のGRNを取得
	 *
	 * @return string|null 経験値の種類マスター のGRN
	 */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	/**
	 * 経験値の種類マスター のGRNを設定
	 *
	 * @param string|null $experienceModelId 経験値の種類マスター のGRN
	 */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	/**
	 * 経験値の種類マスター のGRNを設定
	 *
	 * @param string|null $experienceModelId 経験値の種類マスター のGRN
	 * @return RecoverIntervalTableMaster $this
	 */
	public function withExperienceModelId(?string $experienceModelId): RecoverIntervalTableMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	/**
     * @var int[] ランク毎のスタミナ回復間隔テーブル
	 */
	protected $values;

	/**
	 * ランク毎のスタミナ回復間隔テーブルを取得
	 *
	 * @return int[]|null ランク毎のスタミナ回復間隔テーブル
	 */
	public function getValues(): ?array {
		return $this->values;
	}

	/**
	 * ランク毎のスタミナ回復間隔テーブルを設定
	 *
	 * @param int[]|null $values ランク毎のスタミナ回復間隔テーブル
	 */
	public function setValues(?array $values) {
		$this->values = $values;
	}

	/**
	 * ランク毎のスタミナ回復間隔テーブルを設定
	 *
	 * @param int[]|null $values ランク毎のスタミナ回復間隔テーブル
	 * @return RecoverIntervalTableMaster $this
	 */
	public function withValues(?array $values): RecoverIntervalTableMaster {
		$this->values = $values;
		return $this;
	}

    public function toJson(): array {
        return array(
            "recoverIntervalTableId" => $this->recoverIntervalTableId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "experienceModelId" => $this->experienceModelId,
            "values" => $this->values,
        );
    }

    public static function fromJson(array $data): RecoverIntervalTableMaster {
        $model = new RecoverIntervalTableMaster();
        $model->setRecoverIntervalTableId(isset($data["recoverIntervalTableId"]) ? $data["recoverIntervalTableId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setExperienceModelId(isset($data["experienceModelId"]) ? $data["experienceModelId"] : null);
        $model->setValues(isset($data["values"]) ? $data["values"] : null);
        return $model;
    }
}