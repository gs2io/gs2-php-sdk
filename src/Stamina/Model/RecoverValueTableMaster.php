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
 * スタミナ回復量テーブルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class RecoverValueTableMaster implements IModel {
	/**
     * @var string スタミナ回復量テーブルマスター
	 */
	protected $recoverValueTableId;

	/**
	 * スタミナ回復量テーブルマスターを取得
	 *
	 * @return string|null スタミナ回復量テーブルマスター
	 */
	public function getRecoverValueTableId(): ?string {
		return $this->recoverValueTableId;
	}

	/**
	 * スタミナ回復量テーブルマスターを設定
	 *
	 * @param string|null $recoverValueTableId スタミナ回復量テーブルマスター
	 */
	public function setRecoverValueTableId(?string $recoverValueTableId) {
		$this->recoverValueTableId = $recoverValueTableId;
	}

	/**
	 * スタミナ回復量テーブルマスターを設定
	 *
	 * @param string|null $recoverValueTableId スタミナ回復量テーブルマスター
	 * @return RecoverValueTableMaster $this
	 */
	public function withRecoverValueTableId(?string $recoverValueTableId): RecoverValueTableMaster {
		$this->recoverValueTableId = $recoverValueTableId;
		return $this;
	}
	/**
     * @var string スタミナ回復量テーブル名
	 */
	protected $name;

	/**
	 * スタミナ回復量テーブル名を取得
	 *
	 * @return string|null スタミナ回復量テーブル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * スタミナ回復量テーブル名を設定
	 *
	 * @param string|null $name スタミナ回復量テーブル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * スタミナ回復量テーブル名を設定
	 *
	 * @param string|null $name スタミナ回復量テーブル名
	 * @return RecoverValueTableMaster $this
	 */
	public function withName(?string $name): RecoverValueTableMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string スタミナ回復量テーブルのメタデータ
	 */
	protected $metadata;

	/**
	 * スタミナ回復量テーブルのメタデータを取得
	 *
	 * @return string|null スタミナ回復量テーブルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * スタミナ回復量テーブルのメタデータを設定
	 *
	 * @param string|null $metadata スタミナ回復量テーブルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * スタミナ回復量テーブルのメタデータを設定
	 *
	 * @param string|null $metadata スタミナ回復量テーブルのメタデータ
	 * @return RecoverValueTableMaster $this
	 */
	public function withMetadata(?string $metadata): RecoverValueTableMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string スタミナ回復量テーブルマスターの説明
	 */
	protected $description;

	/**
	 * スタミナ回復量テーブルマスターの説明を取得
	 *
	 * @return string|null スタミナ回復量テーブルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * スタミナ回復量テーブルマスターの説明を設定
	 *
	 * @param string|null $description スタミナ回復量テーブルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * スタミナ回復量テーブルマスターの説明を設定
	 *
	 * @param string|null $description スタミナ回復量テーブルマスターの説明
	 * @return RecoverValueTableMaster $this
	 */
	public function withDescription(?string $description): RecoverValueTableMaster {
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
	 * @return RecoverValueTableMaster $this
	 */
	public function withExperienceModelId(?string $experienceModelId): RecoverValueTableMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	/**
     * @var int[] ランク毎のスタミナ回復量テーブル
	 */
	protected $values;

	/**
	 * ランク毎のスタミナ回復量テーブルを取得
	 *
	 * @return int[]|null ランク毎のスタミナ回復量テーブル
	 */
	public function getValues(): ?array {
		return $this->values;
	}

	/**
	 * ランク毎のスタミナ回復量テーブルを設定
	 *
	 * @param int[]|null $values ランク毎のスタミナ回復量テーブル
	 */
	public function setValues(?array $values) {
		$this->values = $values;
	}

	/**
	 * ランク毎のスタミナ回復量テーブルを設定
	 *
	 * @param int[]|null $values ランク毎のスタミナ回復量テーブル
	 * @return RecoverValueTableMaster $this
	 */
	public function withValues(?array $values): RecoverValueTableMaster {
		$this->values = $values;
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
	 * @return RecoverValueTableMaster $this
	 */
	public function withCreatedAt(?int $createdAt): RecoverValueTableMaster {
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
	 * @return RecoverValueTableMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): RecoverValueTableMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "recoverValueTableId" => $this->recoverValueTableId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "experienceModelId" => $this->experienceModelId,
            "values" => $this->values,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): RecoverValueTableMaster {
        $model = new RecoverValueTableMaster();
        $model->setRecoverValueTableId(isset($data["recoverValueTableId"]) ? $data["recoverValueTableId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setExperienceModelId(isset($data["experienceModelId"]) ? $data["experienceModelId"] : null);
        $model->setValues(isset($data["values"]) ? $data["values"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}