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


class MetricModel implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var array
	 */
	private $labels;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): MetricModel {
		$this->name = $name;
		return $this;
	}
	public function getType(): ?string {
		return $this->type;
	}
	public function setType(?string $type) {
		$this->type = $type;
	}
	public function withType(?string $type): MetricModel {
		$this->type = $type;
		return $this;
	}
	public function getLabels(): ?array {
		return $this->labels;
	}
	public function setLabels(?array $labels) {
		$this->labels = $labels;
	}
	public function withLabels(?array $labels): MetricModel {
		$this->labels = $labels;
		return $this;
	}

    public static function fromJson(?array $data): ?MetricModel {
        if ($data === null) {
            return null;
        }
        return (new MetricModel())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withLabels(!array_key_exists('labels', $data) || $data['labels'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['labels']
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "type" => $this->getType(),
            "labels" => $this->getLabels() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getLabels()
            ),
        );
    }
}