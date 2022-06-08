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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;


class OutputField implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $fieldName;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): OutputField {
		$this->name = $name;
		return $this;
	}
	public function getFieldName(): ?string {
		return $this->fieldName;
	}
	public function setFieldName(?string $fieldName) {
		$this->fieldName = $fieldName;
	}
	public function withFieldName(?string $fieldName): OutputField {
		$this->fieldName = $fieldName;
		return $this;
	}

    public static function fromJson(?array $data): ?OutputField {
        if ($data === null) {
            return null;
        }
        return (new OutputField())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withFieldName(array_key_exists('fieldName', $data) && $data['fieldName'] !== null ? $data['fieldName'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "fieldName" => $this->getFieldName(),
        );
    }
}