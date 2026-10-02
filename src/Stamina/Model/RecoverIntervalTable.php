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
 * Recovery Interval Table
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#recoverintervaltable
 */
class RecoverIntervalTable implements IModel {
	/**
     * @var string Stamina recovery interval table name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Experience Model ID
	 */
	private $experienceModelId;
	/**
     * @var array Recovery Interval Values by Rank (Minutes)
	 */
	private $values;
    /** @return string|null Stamina recovery interval table name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Stamina recovery interval table name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Stamina recovery interval table name
     * @return RecoverIntervalTable
     */
	public function withName(?string $name): RecoverIntervalTable {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return RecoverIntervalTable
     */
	public function withMetadata(?string $metadata): RecoverIntervalTable {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Experience Model ID */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId Experience Model ID */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId Experience Model ID
     * @return RecoverIntervalTable
     */
	public function withExperienceModelId(?string $experienceModelId): RecoverIntervalTable {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return array|null Recovery Interval Values by Rank (Minutes) */
	public function getValues(): ?array {
		return $this->values;
	}
    /** @param array|null $values Recovery Interval Values by Rank (Minutes) */
	public function setValues(?array $values) {
		$this->values = $values;
	}
    /**
     * @param array|null $values Recovery Interval Values by Rank (Minutes)
     * @return RecoverIntervalTable
     */
	public function withValues(?array $values): RecoverIntervalTable {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?RecoverIntervalTable {
        if ($data === null) {
            return null;
        }
        return (new RecoverIntervalTable())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['values']
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "experienceModelId" => $this->getExperienceModelId(),
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues()
            ),
        );
    }
}