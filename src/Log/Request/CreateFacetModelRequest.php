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

class CreateFacetModelRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $field;
    /** @var string */
    private $type;
    /** @var string */
    private $displayName;
    /** @var int */
    private $order;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateFacetModelRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getField(): ?string {
		return $this->field;
	}
	public function setField(?string $field) {
		$this->field = $field;
	}
	public function withField(?string $field): CreateFacetModelRequest {
		$this->field = $field;
		return $this;
	}
	public function getType(): ?string {
		return $this->type;
	}
	public function setType(?string $type) {
		$this->type = $type;
	}
	public function withType(?string $type): CreateFacetModelRequest {
		$this->type = $type;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): CreateFacetModelRequest {
		$this->displayName = $displayName;
		return $this;
	}
	public function getOrder(): ?int {
		return $this->order;
	}
	public function setOrder(?int $order) {
		$this->order = $order;
	}
	public function withOrder(?int $order): CreateFacetModelRequest {
		$this->order = $order;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateFacetModelRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateFacetModelRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withField(array_key_exists('field', $data) && $data['field'] !== null ? $data['field'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withOrder(array_key_exists('order', $data) && $data['order'] !== null ? $data['order'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "field" => $this->getField(),
            "type" => $this->getType(),
            "displayName" => $this->getDisplayName(),
            "order" => $this->getOrder(),
        );
    }
}