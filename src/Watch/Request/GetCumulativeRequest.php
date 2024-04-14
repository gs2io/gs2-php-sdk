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

namespace Gs2\Watch\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetCumulativeRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $resourceGrn;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): GetCumulativeRequest {
		$this->name = $name;
		return $this;
	}
	public function getResourceGrn(): ?string {
		return $this->resourceGrn;
	}
	public function setResourceGrn(?string $resourceGrn) {
		$this->resourceGrn = $resourceGrn;
	}
	public function withResourceGrn(?string $resourceGrn): GetCumulativeRequest {
		$this->resourceGrn = $resourceGrn;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCumulativeRequest {
        if ($data === null) {
            return null;
        }
        return (new GetCumulativeRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withResourceGrn(array_key_exists('resourceGrn', $data) && $data['resourceGrn'] !== null ? $data['resourceGrn'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "resourceGrn" => $this->getResourceGrn(),
        );
    }
}