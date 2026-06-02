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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


class AggregationConfig implements IModel {
	/**
     * @var string
	 */
	private $type;
	/**
     * @var string
	 */
	private $field;
	public function getType(): ?string {
		return $this->type;
	}
	public function setType(?string $type) {
		$this->type = $type;
	}
	public function withType(?string $type): AggregationConfig {
		$this->type = $type;
		return $this;
	}
	public function getField(): ?string {
		return $this->field;
	}
	public function setField(?string $field) {
		$this->field = $field;
	}
	public function withField(?string $field): AggregationConfig {
		$this->field = $field;
		return $this;
	}

    public static function fromJson(?array $data): ?AggregationConfig {
        if ($data === null) {
            return null;
        }
        return (new AggregationConfig())
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withField(array_key_exists('field', $data) && $data['field'] !== null ? $data['field'] : null);
    }

    public function toJson(): array {
        return array(
            "type" => $this->getType(),
            "field" => $this->getField(),
        );
    }
}