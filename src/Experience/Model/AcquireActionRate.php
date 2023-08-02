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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;


class AcquireActionRate implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var array
	 */
	private $rates;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): AcquireActionRate {
		$this->name = $name;
		return $this;
	}
	public function getRates(): ?array {
		return $this->rates;
	}
	public function setRates(?array $rates) {
		$this->rates = $rates;
	}
	public function withRates(?array $rates): AcquireActionRate {
		$this->rates = $rates;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionRate {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionRate())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withRates(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('rates', $data) && $data['rates'] !== null ? $data['rates'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "rates" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getRates() !== null && $this->getRates() !== null ? $this->getRates() : []
            ),
        );
    }
}