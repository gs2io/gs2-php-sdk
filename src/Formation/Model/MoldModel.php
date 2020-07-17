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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;

/**
 * フォームの保存領域
 *
 * @author Game Server Services, Inc.
 *
 */
class MoldModel implements IModel {
	/**
     * @var string フォームの保存領域マスター
	 */
	protected $moldModelId;

	/**
	 * フォームの保存領域マスターを取得
	 *
	 * @return string|null フォームの保存領域マスター
	 */
	public function getMoldModelId(): ?string {
		return $this->moldModelId;
	}

	/**
	 * フォームの保存領域マスターを設定
	 *
	 * @param string|null $moldModelId フォームの保存領域マスター
	 */
	public function setMoldModelId(?string $moldModelId) {
		$this->moldModelId = $moldModelId;
	}

	/**
	 * フォームの保存領域マスターを設定
	 *
	 * @param string|null $moldModelId フォームの保存領域マスター
	 * @return MoldModel $this
	 */
	public function withMoldModelId(?string $moldModelId): MoldModel {
		$this->moldModelId = $moldModelId;
		return $this;
	}
	/**
     * @var string フォームの保存領域名
	 */
	protected $name;

	/**
	 * フォームの保存領域名を取得
	 *
	 * @return string|null フォームの保存領域名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * フォームの保存領域名を設定
	 *
	 * @param string|null $name フォームの保存領域名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * フォームの保存領域名を設定
	 *
	 * @param string|null $name フォームの保存領域名
	 * @return MoldModel $this
	 */
	public function withName(?string $name): MoldModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string メタデータ
	 */
	protected $metadata;

	/**
	 * メタデータを取得
	 *
	 * @return string|null メタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 * @return MoldModel $this
	 */
	public function withMetadata(?string $metadata): MoldModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var FormModel None
	 */
	protected $formModel;

	/**
	 * Noneを取得
	 *
	 * @return FormModel|null None
	 */
	public function getFormModel(): ?FormModel {
		return $this->formModel;
	}

	/**
	 * Noneを設定
	 *
	 * @param FormModel|null $formModel None
	 */
	public function setFormModel(?FormModel $formModel) {
		$this->formModel = $formModel;
	}

	/**
	 * Noneを設定
	 *
	 * @param FormModel|null $formModel None
	 * @return MoldModel $this
	 */
	public function withFormModel(?FormModel $formModel): MoldModel {
		$this->formModel = $formModel;
		return $this;
	}
	/**
     * @var int フォームを保存できる初期キャパシティ
	 */
	protected $initialMaxCapacity;

	/**
	 * フォームを保存できる初期キャパシティを取得
	 *
	 * @return int|null フォームを保存できる初期キャパシティ
	 */
	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}

	/**
	 * フォームを保存できる初期キャパシティを設定
	 *
	 * @param int|null $initialMaxCapacity フォームを保存できる初期キャパシティ
	 */
	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}

	/**
	 * フォームを保存できる初期キャパシティを設定
	 *
	 * @param int|null $initialMaxCapacity フォームを保存できる初期キャパシティ
	 * @return MoldModel $this
	 */
	public function withInitialMaxCapacity(?int $initialMaxCapacity): MoldModel {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}
	/**
     * @var int フォームを保存できるキャパシティ
	 */
	protected $maxCapacity;

	/**
	 * フォームを保存できるキャパシティを取得
	 *
	 * @return int|null フォームを保存できるキャパシティ
	 */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	/**
	 * フォームを保存できるキャパシティを設定
	 *
	 * @param int|null $maxCapacity フォームを保存できるキャパシティ
	 */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	/**
	 * フォームを保存できるキャパシティを設定
	 *
	 * @param int|null $maxCapacity フォームを保存できるキャパシティ
	 * @return MoldModel $this
	 */
	public function withMaxCapacity(?int $maxCapacity): MoldModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

    public function toJson(): array {
        return array(
            "moldModelId" => $this->moldModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "formModel" => $this->formModel->toJson(),
            "initialMaxCapacity" => $this->initialMaxCapacity,
            "maxCapacity" => $this->maxCapacity,
        );
    }

    public static function fromJson(array $data): MoldModel {
        $model = new MoldModel();
        $model->setMoldModelId(isset($data["moldModelId"]) ? $data["moldModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setFormModel(isset($data["formModel"]) ? FormModel::fromJson($data["formModel"]) : null);
        $model->setInitialMaxCapacity(isset($data["initialMaxCapacity"]) ? $data["initialMaxCapacity"] : null);
        $model->setMaxCapacity(isset($data["maxCapacity"]) ? $data["maxCapacity"] : null);
        return $model;
    }
}