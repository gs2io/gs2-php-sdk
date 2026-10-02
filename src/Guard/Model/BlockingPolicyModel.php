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

namespace Gs2\Guard\Model;

use Gs2\Core\Model\IModel;


/**
 * Blocking Policy
 *
 * @see https://docs.gs2.io/api_reference/guard/sdk/#blockingpolicymodel
 */
class BlockingPolicyModel implements IModel {
	/**
     * @var array List of Accessible GS2 Services
	 */
	private $passServices;
	/**
     * @var string Default Restriction
	 */
	private $defaultRestriction;
	/**
     * @var string Location Detection
	 */
	private $locationDetection;
	/**
     * @var array List of Countries to Detect Access
	 */
	private $locations;
	/**
     * @var string Location Restriction Action
	 */
	private $locationRestriction;
	/**
     * @var string Anonymous IP Service Detection
	 */
	private $anonymousIpDetection;
	/**
     * @var string Anonymous IP Restriction Action
	 */
	private $anonymousIpRestriction;
	/**
     * @var string Hosting Provider IP Detection
	 */
	private $hostingProviderIpDetection;
	/**
     * @var string Hosting Provider IP Restriction Action
	 */
	private $hostingProviderIpRestriction;
	/**
     * @var string Reputation IP Detection
	 */
	private $reputationIpDetection;
	/**
     * @var string Reputation IP Restriction Action
	 */
	private $reputationIpRestriction;
	/**
     * @var string IP Address Detection
	 */
	private $ipAddressesDetection;
	/**
     * @var array List of IP Address Ranges
	 */
	private $ipAddresses;
	/**
     * @var string IP Address Restriction Action
	 */
	private $ipAddressRestriction;
    /** @return array|null List of Accessible GS2 Services */
	public function getPassServices(): ?array {
		return $this->passServices;
	}
    /** @param array|null $passServices List of Accessible GS2 Services */
	public function setPassServices(?array $passServices) {
		$this->passServices = $passServices;
	}
    /**
     * @param array|null $passServices List of Accessible GS2 Services
     * @return BlockingPolicyModel
     */
	public function withPassServices(?array $passServices): BlockingPolicyModel {
		$this->passServices = $passServices;
		return $this;
	}
    /** @return string|null Default Restriction */
	public function getDefaultRestriction(): ?string {
		return $this->defaultRestriction;
	}
    /** @param string|null $defaultRestriction Default Restriction */
	public function setDefaultRestriction(?string $defaultRestriction) {
		$this->defaultRestriction = $defaultRestriction;
	}
    /**
     * @param string|null $defaultRestriction Default Restriction
     * @return BlockingPolicyModel
     */
	public function withDefaultRestriction(?string $defaultRestriction): BlockingPolicyModel {
		$this->defaultRestriction = $defaultRestriction;
		return $this;
	}
    /** @return string|null Location Detection */
	public function getLocationDetection(): ?string {
		return $this->locationDetection;
	}
    /** @param string|null $locationDetection Location Detection */
	public function setLocationDetection(?string $locationDetection) {
		$this->locationDetection = $locationDetection;
	}
    /**
     * @param string|null $locationDetection Location Detection
     * @return BlockingPolicyModel
     */
	public function withLocationDetection(?string $locationDetection): BlockingPolicyModel {
		$this->locationDetection = $locationDetection;
		return $this;
	}
    /** @return array|null List of Countries to Detect Access */
	public function getLocations(): ?array {
		return $this->locations;
	}
    /** @param array|null $locations List of Countries to Detect Access */
	public function setLocations(?array $locations) {
		$this->locations = $locations;
	}
    /**
     * @param array|null $locations List of Countries to Detect Access
     * @return BlockingPolicyModel
     */
	public function withLocations(?array $locations): BlockingPolicyModel {
		$this->locations = $locations;
		return $this;
	}
    /** @return string|null Location Restriction Action */
	public function getLocationRestriction(): ?string {
		return $this->locationRestriction;
	}
    /** @param string|null $locationRestriction Location Restriction Action */
	public function setLocationRestriction(?string $locationRestriction) {
		$this->locationRestriction = $locationRestriction;
	}
    /**
     * @param string|null $locationRestriction Location Restriction Action
     * @return BlockingPolicyModel
     */
	public function withLocationRestriction(?string $locationRestriction): BlockingPolicyModel {
		$this->locationRestriction = $locationRestriction;
		return $this;
	}
    /** @return string|null Anonymous IP Service Detection */
	public function getAnonymousIpDetection(): ?string {
		return $this->anonymousIpDetection;
	}
    /** @param string|null $anonymousIpDetection Anonymous IP Service Detection */
	public function setAnonymousIpDetection(?string $anonymousIpDetection) {
		$this->anonymousIpDetection = $anonymousIpDetection;
	}
    /**
     * @param string|null $anonymousIpDetection Anonymous IP Service Detection
     * @return BlockingPolicyModel
     */
	public function withAnonymousIpDetection(?string $anonymousIpDetection): BlockingPolicyModel {
		$this->anonymousIpDetection = $anonymousIpDetection;
		return $this;
	}
    /** @return string|null Anonymous IP Restriction Action */
	public function getAnonymousIpRestriction(): ?string {
		return $this->anonymousIpRestriction;
	}
    /** @param string|null $anonymousIpRestriction Anonymous IP Restriction Action */
	public function setAnonymousIpRestriction(?string $anonymousIpRestriction) {
		$this->anonymousIpRestriction = $anonymousIpRestriction;
	}
    /**
     * @param string|null $anonymousIpRestriction Anonymous IP Restriction Action
     * @return BlockingPolicyModel
     */
	public function withAnonymousIpRestriction(?string $anonymousIpRestriction): BlockingPolicyModel {
		$this->anonymousIpRestriction = $anonymousIpRestriction;
		return $this;
	}
    /** @return string|null Hosting Provider IP Detection */
	public function getHostingProviderIpDetection(): ?string {
		return $this->hostingProviderIpDetection;
	}
    /** @param string|null $hostingProviderIpDetection Hosting Provider IP Detection */
	public function setHostingProviderIpDetection(?string $hostingProviderIpDetection) {
		$this->hostingProviderIpDetection = $hostingProviderIpDetection;
	}
    /**
     * @param string|null $hostingProviderIpDetection Hosting Provider IP Detection
     * @return BlockingPolicyModel
     */
	public function withHostingProviderIpDetection(?string $hostingProviderIpDetection): BlockingPolicyModel {
		$this->hostingProviderIpDetection = $hostingProviderIpDetection;
		return $this;
	}
    /** @return string|null Hosting Provider IP Restriction Action */
	public function getHostingProviderIpRestriction(): ?string {
		return $this->hostingProviderIpRestriction;
	}
    /** @param string|null $hostingProviderIpRestriction Hosting Provider IP Restriction Action */
	public function setHostingProviderIpRestriction(?string $hostingProviderIpRestriction) {
		$this->hostingProviderIpRestriction = $hostingProviderIpRestriction;
	}
    /**
     * @param string|null $hostingProviderIpRestriction Hosting Provider IP Restriction Action
     * @return BlockingPolicyModel
     */
	public function withHostingProviderIpRestriction(?string $hostingProviderIpRestriction): BlockingPolicyModel {
		$this->hostingProviderIpRestriction = $hostingProviderIpRestriction;
		return $this;
	}
    /** @return string|null Reputation IP Detection */
	public function getReputationIpDetection(): ?string {
		return $this->reputationIpDetection;
	}
    /** @param string|null $reputationIpDetection Reputation IP Detection */
	public function setReputationIpDetection(?string $reputationIpDetection) {
		$this->reputationIpDetection = $reputationIpDetection;
	}
    /**
     * @param string|null $reputationIpDetection Reputation IP Detection
     * @return BlockingPolicyModel
     */
	public function withReputationIpDetection(?string $reputationIpDetection): BlockingPolicyModel {
		$this->reputationIpDetection = $reputationIpDetection;
		return $this;
	}
    /** @return string|null Reputation IP Restriction Action */
	public function getReputationIpRestriction(): ?string {
		return $this->reputationIpRestriction;
	}
    /** @param string|null $reputationIpRestriction Reputation IP Restriction Action */
	public function setReputationIpRestriction(?string $reputationIpRestriction) {
		$this->reputationIpRestriction = $reputationIpRestriction;
	}
    /**
     * @param string|null $reputationIpRestriction Reputation IP Restriction Action
     * @return BlockingPolicyModel
     */
	public function withReputationIpRestriction(?string $reputationIpRestriction): BlockingPolicyModel {
		$this->reputationIpRestriction = $reputationIpRestriction;
		return $this;
	}
    /** @return string|null IP Address Detection */
	public function getIpAddressesDetection(): ?string {
		return $this->ipAddressesDetection;
	}
    /** @param string|null $ipAddressesDetection IP Address Detection */
	public function setIpAddressesDetection(?string $ipAddressesDetection) {
		$this->ipAddressesDetection = $ipAddressesDetection;
	}
    /**
     * @param string|null $ipAddressesDetection IP Address Detection
     * @return BlockingPolicyModel
     */
	public function withIpAddressesDetection(?string $ipAddressesDetection): BlockingPolicyModel {
		$this->ipAddressesDetection = $ipAddressesDetection;
		return $this;
	}
    /** @return array|null List of IP Address Ranges */
	public function getIpAddresses(): ?array {
		return $this->ipAddresses;
	}
    /** @param array|null $ipAddresses List of IP Address Ranges */
	public function setIpAddresses(?array $ipAddresses) {
		$this->ipAddresses = $ipAddresses;
	}
    /**
     * @param array|null $ipAddresses List of IP Address Ranges
     * @return BlockingPolicyModel
     */
	public function withIpAddresses(?array $ipAddresses): BlockingPolicyModel {
		$this->ipAddresses = $ipAddresses;
		return $this;
	}
    /** @return string|null IP Address Restriction Action */
	public function getIpAddressRestriction(): ?string {
		return $this->ipAddressRestriction;
	}
    /** @param string|null $ipAddressRestriction IP Address Restriction Action */
	public function setIpAddressRestriction(?string $ipAddressRestriction) {
		$this->ipAddressRestriction = $ipAddressRestriction;
	}
    /**
     * @param string|null $ipAddressRestriction IP Address Restriction Action
     * @return BlockingPolicyModel
     */
	public function withIpAddressRestriction(?string $ipAddressRestriction): BlockingPolicyModel {
		$this->ipAddressRestriction = $ipAddressRestriction;
		return $this;
	}

    public static function fromJson(?array $data): ?BlockingPolicyModel {
        if ($data === null) {
            return null;
        }
        return (new BlockingPolicyModel())
            ->withPassServices(!array_key_exists('passServices', $data) || $data['passServices'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['passServices']
            ))
            ->withDefaultRestriction(array_key_exists('defaultRestriction', $data) && $data['defaultRestriction'] !== null ? $data['defaultRestriction'] : null)
            ->withLocationDetection(array_key_exists('locationDetection', $data) && $data['locationDetection'] !== null ? $data['locationDetection'] : null)
            ->withLocations(!array_key_exists('locations', $data) || $data['locations'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['locations']
            ))
            ->withLocationRestriction(array_key_exists('locationRestriction', $data) && $data['locationRestriction'] !== null ? $data['locationRestriction'] : null)
            ->withAnonymousIpDetection(array_key_exists('anonymousIpDetection', $data) && $data['anonymousIpDetection'] !== null ? $data['anonymousIpDetection'] : null)
            ->withAnonymousIpRestriction(array_key_exists('anonymousIpRestriction', $data) && $data['anonymousIpRestriction'] !== null ? $data['anonymousIpRestriction'] : null)
            ->withHostingProviderIpDetection(array_key_exists('hostingProviderIpDetection', $data) && $data['hostingProviderIpDetection'] !== null ? $data['hostingProviderIpDetection'] : null)
            ->withHostingProviderIpRestriction(array_key_exists('hostingProviderIpRestriction', $data) && $data['hostingProviderIpRestriction'] !== null ? $data['hostingProviderIpRestriction'] : null)
            ->withReputationIpDetection(array_key_exists('reputationIpDetection', $data) && $data['reputationIpDetection'] !== null ? $data['reputationIpDetection'] : null)
            ->withReputationIpRestriction(array_key_exists('reputationIpRestriction', $data) && $data['reputationIpRestriction'] !== null ? $data['reputationIpRestriction'] : null)
            ->withIpAddressesDetection(array_key_exists('ipAddressesDetection', $data) && $data['ipAddressesDetection'] !== null ? $data['ipAddressesDetection'] : null)
            ->withIpAddresses(!array_key_exists('ipAddresses', $data) || $data['ipAddresses'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['ipAddresses']
            ))
            ->withIpAddressRestriction(array_key_exists('ipAddressRestriction', $data) && $data['ipAddressRestriction'] !== null ? $data['ipAddressRestriction'] : null);
    }

    public function toJson(): array {
        return array(
            "passServices" => $this->getPassServices() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getPassServices()
            ),
            "defaultRestriction" => $this->getDefaultRestriction(),
            "locationDetection" => $this->getLocationDetection(),
            "locations" => $this->getLocations() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getLocations()
            ),
            "locationRestriction" => $this->getLocationRestriction(),
            "anonymousIpDetection" => $this->getAnonymousIpDetection(),
            "anonymousIpRestriction" => $this->getAnonymousIpRestriction(),
            "hostingProviderIpDetection" => $this->getHostingProviderIpDetection(),
            "hostingProviderIpRestriction" => $this->getHostingProviderIpRestriction(),
            "reputationIpDetection" => $this->getReputationIpDetection(),
            "reputationIpRestriction" => $this->getReputationIpRestriction(),
            "ipAddressesDetection" => $this->getIpAddressesDetection(),
            "ipAddresses" => $this->getIpAddresses() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getIpAddresses()
            ),
            "ipAddressRestriction" => $this->getIpAddressRestriction(),
        );
    }
}