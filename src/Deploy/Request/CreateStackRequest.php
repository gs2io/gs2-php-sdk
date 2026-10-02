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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createStack: Create Stack
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#createstack
 */
class CreateStackRequest extends Gs2BasicRequest {
    /** @var string Stack name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Update mode */
    private $mode;
    /** @var string Template data */
    private $template;
    /** @var string Token obtained by pre-upload */
    private $uploadToken;
    /** @return string|null Stack name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Stack name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Stack name
     * @return CreateStackRequest
     */
	public function withName(?string $name): CreateStackRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateStackRequest
     */
	public function withDescription(?string $description): CreateStackRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Update mode */
	public function getMode(): ?string {
		return $this->mode;
	}
    /** @param string|null $mode Update mode */
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
    /**
     * @param string|null $mode Update mode
     * @return CreateStackRequest
     */
	public function withMode(?string $mode): CreateStackRequest {
		$this->mode = $mode;
		return $this;
	}
    /** @return string|null Template data */
	public function getTemplate(): ?string {
		return $this->template;
	}
    /** @param string|null $template Template data */
	public function setTemplate(?string $template) {
		$this->template = $template;
	}
    /**
     * @param string|null $template Template data
     * @return CreateStackRequest
     */
	public function withTemplate(?string $template): CreateStackRequest {
		$this->template = $template;
		return $this;
	}
    /** @return string|null Token obtained by pre-upload */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
    /** @param string|null $uploadToken Token obtained by pre-upload */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
    /**
     * @param string|null $uploadToken Token obtained by pre-upload
     * @return CreateStackRequest
     */
	public function withUploadToken(?string $uploadToken): CreateStackRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateStackRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateStackRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withTemplate(array_key_exists('template', $data) && $data['template'] !== null ? $data['template'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "mode" => $this->getMode(),
            "template" => $this->getTemplate(),
            "uploadToken" => $this->getUploadToken(),
        );
    }
}