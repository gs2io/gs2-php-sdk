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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;


/**
 * Aggregation Scope
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#scope
 */
class Scope implements IModel {
	/**
     * @var string Scope Name
	 */
	private $name;
	/**
     * @var int Target Days
	 */
	private $targetDays;
    /** @return string|null Scope Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Scope Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Scope Name
     * @return Scope
     */
	public function withName(?string $name): Scope {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Target Days */
	public function getTargetDays(): ?int {
		return $this->targetDays;
	}
    /** @param int|null $targetDays Target Days */
	public function setTargetDays(?int $targetDays) {
		$this->targetDays = $targetDays;
	}
    /**
     * @param int|null $targetDays Target Days
     * @return Scope
     */
	public function withTargetDays(?int $targetDays): Scope {
		$this->targetDays = $targetDays;
		return $this;
	}

    public static function fromJson(?array $data): ?Scope {
        if ($data === null) {
            return null;
        }
        return (new Scope())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withTargetDays(array_key_exists('targetDays', $data) && $data['targetDays'] !== null ? $data['targetDays'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "targetDays" => $this->getTargetDays(),
        );
    }
}