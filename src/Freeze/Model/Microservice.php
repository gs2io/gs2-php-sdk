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

namespace Gs2\Freeze\Model;

use Gs2\Core\Model\IModel;


class Microservice implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $version;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Microservice {
		$this->name = $name;
		return $this;
	}
	public function getVersion(): ?string {
		return $this->version;
	}
	public function setVersion(?string $version) {
		$this->version = $version;
	}
	public function withVersion(?string $version): Microservice {
		$this->version = $version;
		return $this;
	}

    public static function fromJson(?array $data): ?Microservice {
        if ($data === null) {
            return null;
        }
        return (new Microservice())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? $data['version'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "version" => $this->getVersion(),
        );
    }
}