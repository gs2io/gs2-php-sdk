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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;


class Version implements IModel {
	/**
     * @var int
	 */
	private $major;
	/**
     * @var int
	 */
	private $minor;
	/**
     * @var int
	 */
	private $micro;

	public function getMajor(): ?int {
		return $this->major;
	}

	public function setMajor(?int $major) {
		$this->major = $major;
	}

	public function withMajor(?int $major): Version {
		$this->major = $major;
		return $this;
	}

	public function getMinor(): ?int {
		return $this->minor;
	}

	public function setMinor(?int $minor) {
		$this->minor = $minor;
	}

	public function withMinor(?int $minor): Version {
		$this->minor = $minor;
		return $this;
	}

	public function getMicro(): ?int {
		return $this->micro;
	}

	public function setMicro(?int $micro) {
		$this->micro = $micro;
	}

	public function withMicro(?int $micro): Version {
		$this->micro = $micro;
		return $this;
	}

    public static function fromJson(?array $data): ?Version {
        if ($data === null) {
            return null;
        }
        return (new Version())
            ->withMajor(array_key_exists('major', $data) && $data['major'] !== null ? $data['major'] : null)
            ->withMinor(array_key_exists('minor', $data) && $data['minor'] !== null ? $data['minor'] : null)
            ->withMicro(array_key_exists('micro', $data) && $data['micro'] !== null ? $data['micro'] : null);
    }

    public function toJson(): array {
        return array(
            "major" => $this->getMajor(),
            "minor" => $this->getMinor(),
            "micro" => $this->getMicro(),
        );
    }
}