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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CreateDashboardRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $displayName;
    /** @var string */
    private $description;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateDashboardRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): CreateDashboardRequest {
		$this->displayName = $displayName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateDashboardRequest {
		$this->description = $description;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateDashboardRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateDashboardRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "displayName" => $this->getDisplayName(),
            "description" => $this->getDescription(),
        );
    }
}