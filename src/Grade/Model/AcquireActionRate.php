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

namespace Gs2\Grade\Model;

use Gs2\Core\Model\IModel;


/**
 * Reward Addition Table
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#acquireactionrate
 */
class AcquireActionRate implements IModel {
	/**
     * @var string Reward Addition Table Name
	 */
	private $name;
	/**
     * @var string Reward Addition Table Type
	 */
	private $mode;
	/**
     * @var array Multiplier List per Grade (double mode)
	 */
	private $rates;
	/**
     * @var array Multiplier List per Grade (big mode)
	 */
	private $bigRates;
    /** @return string|null Reward Addition Table Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Reward Addition Table Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Reward Addition Table Name
     * @return AcquireActionRate
     */
	public function withName(?string $name): AcquireActionRate {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Reward Addition Table Type */
	public function getMode(): ?string {
		return $this->mode;
	}
    /** @param string|null $mode Reward Addition Table Type */
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
    /**
     * @param string|null $mode Reward Addition Table Type
     * @return AcquireActionRate
     */
	public function withMode(?string $mode): AcquireActionRate {
		$this->mode = $mode;
		return $this;
	}
    /** @return array|null Multiplier List per Grade (double mode) */
	public function getRates(): ?array {
		return $this->rates;
	}
    /** @param array|null $rates Multiplier List per Grade (double mode) */
	public function setRates(?array $rates) {
		$this->rates = $rates;
	}
    /**
     * @param array|null $rates Multiplier List per Grade (double mode)
     * @return AcquireActionRate
     */
	public function withRates(?array $rates): AcquireActionRate {
		$this->rates = $rates;
		return $this;
	}
    /** @return array|null Multiplier List per Grade (big mode) */
	public function getBigRates(): ?array {
		return $this->bigRates;
	}
    /** @param array|null $bigRates Multiplier List per Grade (big mode) */
	public function setBigRates(?array $bigRates) {
		$this->bigRates = $bigRates;
	}
    /**
     * @param array|null $bigRates Multiplier List per Grade (big mode)
     * @return AcquireActionRate
     */
	public function withBigRates(?array $bigRates): AcquireActionRate {
		$this->bigRates = $bigRates;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionRate {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionRate())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withRates(!array_key_exists('rates', $data) || $data['rates'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['rates']
            ))
            ->withBigRates(!array_key_exists('bigRates', $data) || $data['bigRates'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['bigRates']
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "mode" => $this->getMode(),
            "rates" => $this->getRates() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getRates()
            ),
            "bigRates" => $this->getBigRates() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getBigRates()
            ),
        );
    }
}