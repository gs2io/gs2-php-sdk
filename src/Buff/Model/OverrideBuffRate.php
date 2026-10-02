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

namespace Gs2\Buff\Model;

use Gs2\Core\Model\IModel;


/**
 * Buff application rate override model
 *
 * @see https://docs.gs2.io/api_reference/buff/sdk/#overridebuffrate
 */
class OverrideBuffRate implements IModel {
	/**
     * @var string Buff Entry Model name
	 */
	private $name;
	/**
     * @var float Rate
	 */
	private $rate;
    /** @return string|null Buff Entry Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Buff Entry Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Buff Entry Model name
     * @return OverrideBuffRate
     */
	public function withName(?string $name): OverrideBuffRate {
		$this->name = $name;
		return $this;
	}
    /** @return float|null Rate */
	public function getRate(): ?float {
		return $this->rate;
	}
    /** @param float|null $rate Rate */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
    /**
     * @param float|null $rate Rate
     * @return OverrideBuffRate
     */
	public function withRate(?float $rate): OverrideBuffRate {
		$this->rate = $rate;
		return $this;
	}

    public static function fromJson(?array $data): ?OverrideBuffRate {
        if ($data === null) {
            return null;
        }
        return (new OverrideBuffRate())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withRate(array_key_exists('rate', $data) && $data['rate'] !== null ? $data['rate'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "rate" => $this->getRate(),
        );
    }
}